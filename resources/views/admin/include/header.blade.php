@php
    $user = auth()->user();
    if($user->hasRole('agent')){
        $franchise = \App\Models\Franchise::where('user_id', $user->id)->first();
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
