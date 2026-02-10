@php
use Carbon\Carbon;
use App\Models\University;
use App\Models\Program;
use App\Models\StudentByAgent;
use App\Models\Payment;
use App\Models\PaymentsLink;

$user = Auth::user();
$franchise = $user ? DB::table('agents')->where('email', $user->email)->first() : null;

$oldUniversities = $oldPrograms = $duePayments = $todayLead = 0;

if ($user) {

    // ---------------- ADMIN / DATA OPERATOR ----------------
    if (
        $user->hasRole('Administrator') || 
        $user->hasRole('data operator') || 
        $user->hasRole('Sub Data-Operator')
    ) {

        $oldUniversities = University::whereDate('updated_at', '<', Carbon::now()->subMonths(3))->count();
        $oldPrograms = Program::whereDate('updated_at', '<', Carbon::now()->subMonths(3))->count();

        $duePayments = Payment::join('student', 'student.email', '=', 'payments.customer_email')
            ->join('payments_link', 'payments_link.email', '=', 'payments.customer_email')
            ->whereDate('payments_link.due_date', '<', Carbon::now())
            ->distinct('student.email')
            ->count();

        // All leads
        $todayLead = StudentByAgent::whereDate('updated_at', '<=', Carbon::today())
            ->where('lead_status', 1)
            ->count();

            
    }

    // ------------------- AGENT -------------------
    elseif ($user->hasRole('agent')) {

        $agents = DB::select("SELECT id FROM users WHERE added_by = $user->id");
        $commaList = "";
        foreach ($agents as $a) {
            $commaList .= $a->id . ",";
        }
        $users = $commaList . $user->id;

        $todayLead = StudentByAgent::whereRaw("assigned_to IN($users)")
            ->where('lead_status', 1)
            ->count();

            

        $duePayments = Payment::join('student', 'student.email', '=', 'payments.customer_email')
            ->join('payments_link', 'payments_link.email', '=', 'payments.customer_email')
            ->whereDate('payments_link.due_date', '<', Carbon::now())
            ->distinct('student.email')
            ->count();
    }

    // ---------------- SUB-AGENT ----------------
    else {

        $oldUniversities = University::where('user_id', $user->id)
            ->whereDate('updated_at', '<', Carbon::now()->subMonths(3))
            ->count();

        $oldPrograms = Program::where('user_id', $user->id)
            ->whereDate('updated_at', '<', Carbon::now()->subMonths(3))
            ->count();

        $duePayments = PaymentsLink::where('user_id', $user->id)
            ->whereDate('due_date', '<', Carbon::now())
            ->count();

        $todayLead = StudentByAgent::where('assigned_to', $user->id)
            ->where('lead_status', 1)
            ->whereDate('updated_at', '<=', Carbon::today())
            ->count();
    }
}
@endphp



<!-- ================== HEADER START ================== -->
<div class="header">

  <div class="header-left">
    <a href="{{ url('/') }}" class="logo2">
      <img src="{{ asset('assets/img/loo.png') }}" width="40%" alt="Logo">
    </a>
  </div>

  <a id="toggle_btn" href="javascript:void(0);">
    <span class="bar-icon"><span></span><span></span><span></span></span>
  </a>

  <div class="page-title-box">
    <h3>Overseas Education Lane</h3>
  </div>

  <a id="mobile_btn" class="mobile_btn" href="#sidebar">
    <i class="fa-solid fa-bars"></i>
  </a>

  <ul class="nav user-menu">

  
    @if($user)
    <li class="nav-item dropdown">

      <a href="#" class="dropdown-toggle nav-link d-flex align-items-center gap-3" data-bs-toggle="dropdown">

        <i class="fa-regular fa-bell" style="font-size:20px;"></i>

        <span class="badge bg-warning rounded-pill">{{ $oldUniversities }}</span>
        <span class="badge bg-success rounded-pill">{{ $oldPrograms }}</span>

        @if(
            $user->hasRole('Administrator') || 
            $user->hasRole('agent') ||
            $user->hasRole('sub_agent')
        )
            <span class="badge bg-danger rounded-pill">{{ $todayLead }}</span>
        @endif
      </a>

      <div class="dropdown-menu notifications">
        <div class="topnav-dropdown-header">
            <span class="notification-title">Notifications</span>
        </div>

        <div class="topnav-dropdown-footer">
            <a href="{{ route('updation-program') }}">{{ $oldPrograms }} Old Programs</a>
        </div>

        <div class="topnav-dropdown-footer">
            <a href="{{ route('update-university') }}">{{ $oldUniversities }} Old Universities</a>
        </div>

        @if(
            $user->hasRole('Administrator') || 
            $user->hasRole('agent') ||
            $user->hasRole('sub_agent')
        )
        <div class="topnav-dropdown-footer">
            <a href="{{ url('admin/leads-lists?lead_status=1')}}">{{ $todayLead }} Lead Today</a>
        </div>
        @endif

      </div>
    </li>
    @endif

    <!-- User -->
    <li class="nav-item dropdown has-arrow main-drop">
      <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
        <span>{{ ucfirst($user->name) }} - {{ $user->roles->pluck('name')->join(', ') }}</span>
      </a>

      <div class="dropdown-menu">
        @if($user->hasRole('agent'))
          <a class="dropdown-item" href="{{ url('franchise/edit-franchise/'.$franchise->id) }}">My Profile</a>
        @endif
        <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
      </div>
    </li>

  </ul>
</div>
<!-- ================ HEADER END ================== -->




@if(
    auth()->user()->hasRole('Administrator') || 
    auth()->user()->hasRole('agent') || 
    auth()->user()->hasRole('sub_agent')
)
<audio id="leadSound">
    <source src="{{ asset('assets/noti.mp3') }}" type="audio/mpeg">
</audio>

<script>
document.addEventListener('DOMContentLoaded', function () {

    let newLeads = {{ $todayLead ?? 0 }};
    if (newLeads <= 0) return;

    const sound = document.getElementById('leadSound');

    /* -----------------------------------------------------
       1️⃣ TRY TO UNLOCK AUDIO WITHOUT USER CLICK
    ------------------------------------------------------*/
    function unlockAudio() {
        let silent = document.createElement("audio");
        silent.src = ""; // Empty audio
        silent.play().catch(() => {});
    }
    unlockAudio();

    /* -----------------------------------------------------
       2️⃣ PLAY NOTIFICATION
    ------------------------------------------------------*/
    function notifyLead() {
        sound.pause();
        sound.currentTime = 0;

        sound.play().catch(() => {
            // if still blocked – try unlock again
            unlockAudio();
            sound.play().catch(()=>{});
        });

        toastr.success(`You Have ${newLeads} New Leads`, "New Leads 😃", {
            timeOut: 4000,
            closeButton: true,
            progressBar: true,
        });
    }

    /* -----------------------------------------------------
       3️⃣ START LOOP (EVERY 10 SEC)
    ------------------------------------------------------*/
    function startNotificationLoop() {
        notifyLead();

        setInterval(() => {
            notifyLead();
        }, 10000);
    }

    /* -----------------------------------------------------
       4️⃣ IF AUTOPLAY BLOCKED – AUTO FORCE UNLOCK AFTER 1 SEC
    ------------------------------------------------------*/
    setTimeout(() => {
        startNotificationLoop();
    }, 1000);

});
</script>
@endif
