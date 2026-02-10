
@extends('frontend.layouts.main')
@section('title', 'Course Finder')
@section('content')
<style>
.content-part{
    margin-top: 10px;
}
.university-item a{
    text-decoration: none;
}
.btn-part a{
    background: #112958;
    color: #fff;
    text-decoration: none;
    padding: 10px 20px;
    border-radius: 6px;
}
.course_card_logo_sec img, .university_logo img{
    width: 200px;
    height: auto;
}
  .form-input {
    display: flex;
    padding: 10px 10px;
    border-bottom: 1px dashed #DCDCDC;
}

.nav-link-universe {
    background: #ffffff;
    padding: 8px;
    border-radius: 12px;
    box-shadow: 0 4px 6px rgba(7, 7, 88, 0.1);
}

.nav-link {
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    border: 2px solid #070758 !important;
    border-radius: 8px !important;
    margin: 4px !important;
    position: relative;
    overflow: hidden;
    font-family: 'Inter', sans-serif;
}

.nav-link i {
    margin-right: 8px;
    font-size: 1.1em;
}

.nav-link.active {
    background: linear-gradient(135deg, #070758, #0b0b8f) !important;
    color: #ffffff !important;
    box-shadow: 0 4px 15px rgba(7, 7, 88, 0.2);
}

.nav-link:not(.active) {
    background-color: #ffffff !important;
    color: #070758 !important;
}

.nav-link:hover:not(.active) {
    background: linear-gradient(135deg, #070758, #0b0b8f) !important;
    color: #ffffff !important;
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(7, 7, 88, 0.15);
}

.university_count, .course_count {
    display: inline-block;
    padding: 2px 8px;
    border-radius: 12px;
    font-size: 0.9em;
    transition: all 0.3s ease;
    background: rgba(255, 255, 255, 0.2);
}

.nav-link:not(.active) .university_count,
.nav-link:not(.active) .course_count {
    background: rgba(7, 7, 88, 0.1);
}

.nav-link:hover:not(.active) .university_count,
.nav-link:hover:not(.active) .course_count {
    background: rgba(255, 255, 255, 0.2);
}

@keyframes pulse {
    0% { opacity: 1; }
    50% { opacity: 0.7; }
    100% { opacity: 1; }
}

.nav-link.loading {
    animation: pulse 1.5s infinite;
}
.main-tag-line .inner-column h4{
  color: black;
  
}
</style>

@php
    $country_name = App\Models\Country::whereIn('id', explode(',', $_GET['country'] ?? null))->Select('name','id')->get();
    $program_level_name = App\Models\ProgramLevel::whereIn(
    'id',
    explode(',', $_GET['program_level'] ?? null),
    )->get();
    $program_sub_level_name = App\Models\ProgramSubLevel::whereIn(
    'id',
    explode(',', $_GET['program_sub_level'] ?? null),
    )->get();
    $education_level_name = App\Models\EducationLevel::whereIn(
    'id',
    explode(',', $_GET['education_level'] ?? null),
    )->get();
    $program_discipline_name = App\Models\ProgramDiscipline::whereIn(
    'id',
    explode(',', $_GET['program_discipline'] ?? null),
    )->get();
    $program_sub_discipline_name = App\Models\ProgramSubdiscipline::whereIn(
    'id',
    explode(',', $_GET['program_subdispline'] ?? null),
    )->get();
    $eng_proficiency_level_name = App\Models\EngProficiencyLevel::whereIn(
    'id',
    explode(',', $_GET['eng_proficiency_level'] ?? null),
    )->get();
    
    $other_exam_name = App\Models\Exam::whereIn('id', explode(',', $_GET['other_exam'] ?? null))->get();
    $intake=  explode(',', $_GET['intake'] ?? null);
   
    

    
    $state = App\Models\Province::where('id', $university->state ?? null)->get();
    $university_type = App\Models\SchoolType::where('id', $university->type_of_university ?? null)->get();
@endphp
@if(Auth::check())
    @php
    $user=Auth::user();
    $student_data=DB::table('student')->select('country_id','id')->where('user_id',$user->id)->first();
    $program_id=DB::table('student_by_agent')->select('program_label')->where('student_user_id',$student_data->id ?? null)->first();
    $education_id=DB::table('education_history')->select('education_level_id')->where('student_id',$student_data->id  ?? null)->first();
    @endphp
@endif
<section>
   <div class="tan-title-tag container mx-auto mt-5">
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        <div class="d-flex gap-2 country-alix">
            <div class="country_name">
                @foreach ($country_name as $item)
                <span class="badge bg-primary text-dark">{{ $item->name }}</span>
                @endforeach
            </div>
            <div class="program_level_name">
                @foreach ($program_level_name as $item)
                    <span class="badge bg-primary text-dark">{{ $item->name }}</span>
                @endforeach
            </div>
            <div class="program_sub_level_name">
                @foreach ($program_sub_level_name as $item)
                    <span class="badge bg-primary text-white">{{ $item->name }}</span>
                @endforeach
            </div>
            <div class="education_level_name">
                @foreach ($education_level_name as $item)
                    <span class="badge bg-primary text-white">{{ $item->name }}</span>
                @endforeach
            </div>
            <div class="intake_name">

            @foreach ($intake as $month)
            @if (!$month)
            @else
                    <span class="badge bg-primary text-white">
                    {{ date('M', strtotime(date('Y') . '-' . $month . '-01')) }}
                    </span>   
            @endif
            @endforeach

          
            
            </div>
            <div class="program_discipline_name">
                @foreach ($program_discipline_name as $item)
                    <span class="badge bg-primary text-white">{{ $item->name }}</span>
                @endforeach
            </div>
            <div class="program_sub_discipline_name">
                @foreach ($program_sub_discipline_name as $item)
                    <span class="badge bg-primary text-white">{{ $item->name }}</span>
                @endforeach
            </div>
            <div class="eng_proficiency_level_name">
                @foreach ($eng_proficiency_level_name as $item)
                    <span class="badge bg-primary text-white">{{ $item->name }}</span>
                @endforeach
            </div>
            <div class="other_exam_name">
                @foreach ($other_exam_name as $item)
                    <span class="badge bg-primary text-white">{{ $item->name }}</span>
                @endforeach
            </div>
            <br>
        </div>
      <div class="container py-2">
         <div class="w-lg-50 mx-auto d-flex align-items-center course-finder-title">
            <h1 class=""><img src="{{asset('frontend/img/party.png')}}"></h1>
            <h2 class="mx-2"><span class="course_count"></span> Courses in
                <span class="university_count"></span> universities found</h2>
         </div>
      </div>
      <div class="main-tag-line mb-4">
         <div class="container">
            <div class="row">
               <div class=" col-lg-4 ">
               <div class="inner-column py-3">
               <h4 class="fw-bold ">Search & Filters</h4>
                     <div class="faq-section py-3">
                        <div class="w-lg-50 mx-auto">
                           <div class="accordion accordion-flush row g-2 border-lg" id="accordionExample">
                              <!-- 1: country -->
                             
                              <div class="accordion-item">
                                 <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button"
                                       data-bs-toggle="collapse" data-bs-target="#col1"
                                       aria-expanded="false" aria-controls="col1">
                                       <h5>Country</h5>
                                    </button>
                                 </h2>
                                 <div id="col1" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionExample">
                                    <div class="addto-search">
                                       <form action="#">
                                          <div class="form-input">
                                             <input class="keyword" type="text"
                                                placeholder="Search Country">
                                             <button class="search-button  srchbtn">
                                             <i class="fa fa-search"></i>
                                             </button>
                                          </div>
                                       </form>
                                    </div>
                                    <div class="addto-playlists1">
                                       <ul>
                                            @foreach ($country as $item)
                                                <li>
                                                          <label for="{{ $item->id }}-country" class="country-name">
                                                  
                                                        <input type="checkbox" name="country[]" class="country-checkbox"
                                                            value="{{ $item->id }}"
                                                            id="{{ $item->id }}-country"
                                                            {{ in_array($item->id, $country_name->pluck('id')->toArray()) ? 'checked' : '' }}>
                                                        

                                                          {{ $item->name }}
                                                         </label>
                                                </li>
                                            @endforeach
                                       </ul>
                                    </div>
                                 </div>
                              </div>
                             
                              <div class="accordion-item">
                                 <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button"
                                       data-bs-toggle="collapse" data-bs-target="#col2"
                                       aria-expanded="false" aria-controls="col2">
                                       <h5>Program Level</h5>
                                    </button>
                                 </h2>
                                 <div id="col2" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionExample">
                                    <div class="addto-search">
                                       <form action="#">
                                          <div class="form-input ">
                                             <input class="keyword1" type="text"
                                                placeholder="Program Level "><button class="search-button  srchbtn">
                                             <i class="fa fa-search"></i>
                                             </button>
                                          </div>
                                       </form>
                                    </div>
                                    <div class="addto-playlists2">
                                       <ul>
                                          @foreach ($program_level as $item)
                                          <li>
                                             <label for="{{ $item->id }}-program-level"  class="country-name"
                                                >
                                             <input class="program_level_value"
                                             id="{{ $item->id }}-program-level"
                                             {{ in_array($item->id, $program_level_name->pluck('id')->toArray()) ? 'checked' : '' }}
                                             type="checkbox" name="program_level[]"
                                             value="{{ $item->id }}"
                                             onchange="fetchProgramSubLevel(this.id)">
                                             {{ $item->name }} </label>
                                          </li>
                                          @endforeach
                                       </ul>
                                    </div>
                                 </div>
                              </div>

                              <div class="accordion-item">
                                 <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" id="education_level" type="button"
                                       data-bs-toggle="collapse" data-bs-target="#col3"
                                       aria-expanded="false" aria-controls="col3">
                                       <h5>Program Sub Level</h5>
                                    </button>
                                 </h2>
                                 <div id="col3" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionExample">
                                    <div class="addto-search">
                                      
                                    </div>
                                    <div class="addto-playlists3">
                                       <ul class="program-sub-level">
                                       </ul>
                                    </div>
                                 </div>
                              </div>
                              <!-- 4: Education level -->


                                <!-- <div class="accordion-item">
                                <h2 class="accordion-header">
                                   <button class="accordion-button collapsed" type="button"
                                      data-bs-toggle="collapse" data-bs-target="#col4"
                                      aria-expanded="false" aria-controls="col4">
                                      <h5>Education Level</h5>
                                   </button>
                                </h2>
                                <div id="col4" class="accordion-collapse collapse"  data-bs-parent="#accordionExample">
                                   <div class="addto-playlists4">
                                      <ul id="education-level-list">
                                      </ul>
                                   </div>
                                </div>
                                </div> -->

                              {{-- Program Discipline --}}
                              <div class="accordion-item">
                                 <h2 class="accordion-header">
                                    <button class="accordion-button collapsed subdiscipline" type="button"
                                       data-bs-toggle="collapse" data-bs-target="#col6"
                                       aria-expanded="false" aria-controls="col6">
                                       <h5>Program Discipline</h5>
                                    </button>
                                 </h2>
                                 <div id="col6" class="accordion-collapse collapse"  data-bs-parent="#accordionExample">
                                    <div class="addto-playlists6">
                                       <ul>
                                          @foreach ($program_discipline as $item)
                                          <li>
                                            <label class="playlist-name" for="discipline_{{ $item->id }}">
                                                <input 
                                                type="checkbox"
                                                name="program_discipline[]"
                                                class="program_discipline_checkbox"
                                                id="discipline_{{ $item->id }}"
                                                value="{{ $item->id }}"
                                                {{ in_array($item->id, $program_discipline_name->pluck('id')->toArray()) ? 'checked' : '' }}
                                                >
                                                {{ $item->name }}
                                            </label>
                                            </li>

                                          @endforeach
                                       </ul>
                                    </div>
                                 </div>
                              </div>
                              {{-- Program Sub Discipline --}}
                              <div class="accordion-item">
                                <h2 class="accordion-header">
                                   <button class="accordion-button collapsed" type="button"
                                      data-bs-toggle="collapse" data-bs-target="#col7"
                                      aria-expanded="false" aria-controls="col7">
                                      <h5>Program Sub Discipline</h5>
                                   </button>
                                </h2>
                                <div id="col7" class="accordion-collapse collapse"  data-bs-parent="#accordionExample">
                                   <div class="addto-playlists4">
                                      <ul class="program_subdiscipline">
                                      </ul>
                                   </div>
                                </div>
                              </div>

                              <!-- 5: Intake -->
                              <div class="accordion-item">
                                 <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button"
                                       data-bs-toggle="collapse" data-bs-target="#col5"
                                       aria-expanded="false" aria-controls="col5">
                                       <h5>Intake</h5>
                                    </button>
                                 </h2>
                                 <div id="col5" class="accordion-collapse collapse"  data-bs-parent="#accordionExample">
                                    <div class="addto-playlists5">
                                       <ul>
                                          @foreach (range(1, 12) as $month)
                                          <li>
                                             <label for="random-{{ $month }}"
                                                class="playlist-name">
                                             <input id="random-{{ $month }}" type="checkbox"
                                                name="intake[]" class="intake-name-data"
                                                value="{{ $month }}" id="">
                                             {{ date('M', strtotime(date('Y') . '-' . $month . '-01')) }}</label>
                                          </li>
                                          @endforeach
                                       </ul>
                                    </div>
                                 </div>
                              </div>
                              {{-- eng pro level  --}}
                              <div class="accordion-item">
                                 <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button"
                                       data-bs-toggle="collapse" data-bs-target="#col8"
                                       aria-expanded="false" aria-controls="col8">
                                       <h5>English Proficiency Level  </h5>
                                    </button>
                                 </h2>
                                 <div id="col8" class="accordion-collapse collapse"  data-bs-parent="#accordionExample">
                                    <div class="addto-playlists8">
                                       <ul>
                                          @foreach ($eng_proficiency_level as $item)
                                          <li>
                                             <label for="random-1" class="playlist-name">
                                             <input type="checkbox" name="end_profiency_level[]"
                                             class="eng-pro"
                                             {{ in_array($item->id, $eng_proficiency_level_name->pluck('id')->toArray()) ? 'checked' : '' }}
                                             value="{{ $item->id }}"
                                             id="{{ $item->id }} "> {{ $item->name }}
                                             </label>
                                          </li>
                                          @endforeach
                                       </ul>
                                    </div>
                                 </div>
                              </div>
                              {{-- Other Exam  --}}
                              <div class="accordion-item">
                                 <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button"
                                       data-bs-toggle="collapse" data-bs-target="#col9"
                                       aria-expanded="false" aria-controls="col9">
                                       <h5>Other Exam</h5>
                                    </button>
                                 </h2>
                                 <div id="col9" class="accordion-collapse collapse"  data-bs-parent="#accordionExample">
                                    <div class="addto-playlists9">
                                       <ul>
                                          @foreach ($exam as $item)
                                          <li>
                                             <label for="random-1" class="playlist-name">
                                             <input type="checkbox" name="other_exam[]"
                                             class="other_exam_check"
                                             {{ in_array($item->id, $eng_proficiency_level_name->pluck('id')->toArray()) ? 'checked' : '' }}
                                             value="{{ $item->id }}"
                                             id="{{ $item->id }} "> {{ $item->name }}
                                             </label>
                                          </li>
                                          @endforeach
                                       </ul>
                                    </div>
                                 </div>
                              </div>
                              {{-- Scholarship  --}}
                              <!-- <div class="accordion-item">
                                 <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button"
                                       data-bs-toggle="collapse" data-bs-target="#col10"
                                       aria-expanded="false" aria-controls="col10">
                                       <h5>Scholarship</h5>
                                    </button>
                                 </h2>
                                 <div id="col10" class="accordion-collapse collapse"  data-bs-parent="#accordionExample">
                                    <div class="addto-playlists10">
                                       <ul>
                                          <li>
                                             <label for="random-1" class="playlist-name">
                                             <input id="random-1" type="checkbox" name="schlorship[]"
                                                value="schlarship"> Scholarship Available </label>
                                          </li>
                                       </ul>
                                    </div>
                                 </div>
                              </div> -->
                              {{-- Tuition Fees Budget --}}
                              {{--<div class="accordion-item">
                                 <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button"
                                       data-bs-toggle="collapse" data-bs-target="#col11"
                                       aria-expanded="false" aria-controls="col11">
                                       <h5>Tuition Fees Budget</h5>
                                    </button>
                                 </h2>
                                 <div id="col11" class="accordion-collapse collapse"  data-bs-parent="#accordionExample">
                                    <div class="addto-playlists11">
                                       <ul>
                                          <li>
                                             <label for="random-1" class="playlist-name">
                                             <input id="random-1" type="checkbox" name="tution_fees[]"
                                                value="tution_fees">Tuition Fees Budget</label>
                                          </li>
                                       </ul>
                                    </div>
                                 </div>
                              </div>--}}
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-8 pt-3">
                  <div class="tabing-tab">
                     <div class=" ">
                        <div class="cards">
                         
                            <div class="nav nav-tabs nav-link-universe" id="nav-tab" role="tablist">
                                <button class="nav-link w-100 app-vt active fs-6 fw-bold" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="true" onclick="showProfileTab()" tabindex="-1">
                                    <i class="fa fa-university" aria-hidden="true"></i>
                                     <span>Universities</span>
                                     <span class="university_count">0</span>
                                </button>
                                <button class="nav-link w-100 apps-vt fs-6 fw-bold" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false" onclick="showContactTab()">
                                    <i class="fa fa-book" aria-hidden="true"></i>
                                        <span>Courses</span>
                                       <span class="course_count">0</span>
                                </button>
                            </div>
                            <script>
                                function showProfileTab() {
                                const profileTab = document.getElementById('nav-profile-tab');
                                const contactTab = document.getElementById('nav-contact-tab');

                                profileTab.classList.add('active');
                                contactTab.classList.remove('active');
                                }

                                function showContactTab() {
                                const profileTab = document.getElementById('nav-profile-tab');
                                const contactTab = document.getElementById('nav-contact-tab');

                                contactTab.classList.add('active');
                                profileTab.classList.remove('active');
                                }
                            </script>

                           <div class="tab-content " id="nav-tabContent">
                              <div class="tab-pane fade active show mt-lg-3" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                 <div class="ehl-heading mt-1">
                                    <div class="ehl-heading border-0">
                                       <div class="text-ehl-title">
                                          <h1>Universities</h1>
                                       </div>
                                    </div>
                                    <div class=" justify-content-between mx-lg-3 align-items row " id="university">
                                    </div>
                                 </div>
                              </div>
                              <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                 <div class="ehl-heading mt-1">
                                    <div class="ehl-heading border-0">
                                       <div class="text-ehl-title">
                                          <h1>Courses</h1>
                                       </div>
                                    </div>
                                    <div class="course_data justify-content-between gap-2 align-items">
                                   </div>

                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   </div>
   </div>
</section>
@endsection
@section('javascript_section')
<script type="text/javascript">
   (function($) {
       $(".keyword").on('keyup', function(e) {
           var $this = $(this);
           var exp = new RegExp($this.val(), 'i');
           $(".addto-playlists1 li label").each(function() {
               var $self = $(this);
               if (!exp.test($self.text())) {
                   $self.parent().hide();
               } else {
                   $self.parent().show();
               }
           });
       });
   })(jQuery);
   (function($) {
       $(".keyword1").on('keyup', function(e) {
           var $this = $(this);
           var exp = new RegExp($this.val(), 'i');
           $(".addto-playlists2 li label").each(function() {
               var $self = $(this);
               if (!exp.test($self.text())) {
                   $self.parent().hide();
               } else {
                   $self.parent().show();
               }
           });
       });
   })(jQuery);
</script>


<script>
         $(document).ready(function () {
    // ---------- GLOBAL VARIABLES ----------
    let pages = 2;
    let bool = false;
    let lastPage;

    // ---------- CSRF HEADER SETUP ----------
    function csrf() {
        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });
    }

    // ---------- URL PARAM HANDLER ----------
    function getParams() {
        return new URLSearchParams(window.location.search).toString();
    }

    // ---------- LAZY LOAD (ON SCROLL) ----------
    $(window).scroll(function () {
        const triggerHeight = 500;
        if ($(window).scrollTop() + $(window).height() >= triggerHeight && !bool && lastPage > pages - 2) {
            bool = true;
            $('.ajax-load').show();
            lazyLoad(pages).then(() => {
                bool = false;
                pages++;
                if (pages - 2 === lastPage) $('.no-data').show();
            });
        }
    });

    // ---------- UNIVERSAL RENDER HELPERS ----------
    function renderUniversity(item) {
        const urlParams = getParams();
        let programUrl = '';

        if (!urlParams) {
            @if(auth()->check())
                programUrl = `<a href="{{ url('selected-program-data') }}?selected_program_id=${item.program_ids}" class="badge bg-primary">${item.program_count ?? 0} View Programs</a>`;
            @else
                programUrl = `<a href="{{ url('view-program-data') }}?selected_program_id=${item.program_ids}" class="badge bg-primary">${item.program_count ?? 0} View Programs</a>`;
            @endif
        } else {
            programUrl = `<a href="{{ url('view-program-data') }}?selected_program_id=${item.program_ids}" class="badge bg-primary">${item.program_count ?? 0} View Programs</a>`;
        }

        return `
        <div class="university-item course-logo card border-lg shadow-sm rounded-3">
            <div class="d-flex justify-content-between align-items-center">
                <a href="${item.website || '#'}" class="university_logo">
                    <div class="u-logo">
                        <img src="${window.location.origin}/public/${item.logo || ''}" alt="university-logo" class="img-fluid uc-logo">
                    </div>
                </a>
                <h5 class="university_name fw-bold text-end w-75">
                    <a href="${item.website || '#'}">${item.university_name || ''}</a>
                </h5>
            </div>
            <div class="content-part">
                <ul class="meta-part">
                    <li><i class="fa fa-map"></i> <b>Location:</b> ${item.country?.name || ''}, ${item.city || ''}, ${item.zip || ''}</li>
                    <li><i class="fa fa-flag"></i> <b>Country:</b> ${item.country?.name || ''}</li>
                    <li><i class="fa fa-list"></i> <b>University Type:</b> ${item.university_type?.name || ''}</li>
                    <li><i class="fa fa-tasks"></i> <b>Total Program:</b> ${programUrl}</li>
                </ul>
                <div class="bottom-part text-end">
                    <a href="university-details/${item.id}" class="btn btn-outline-primary btn-sm">View Details <i class="flaticon-right-arrow"></i></a>
                </div>
            </div>
        </div><hr class="mt-10">
        `;
    }

    function renderCourse(item) {
        return `
        <div class="col-lg-12 col-md-4 col-sm-6 mt-30">
            <div class="courses-item course-logo card border-lg shadow-sm rounded-3">
                <div class="course_card_logo_sec d-flex gap-5">
                    <div class="img-part" style="margin: 2px 5px;">
                        <a href="{{url('course-details')}}/${item.id}">
                            <img src="${window.location.origin}/public/${item.university_name?.logo || ''}" class="img-thumbnail university_logo" alt="university logo">
                        </a>
                    </div>
                    <div class="text-end flex-grow-1">
                        <h5 class="fw-bold mb-1"><a href="{{url('course-details')}}/${item.id}">${item.name || ''}</a></h5>
                        <a href="${item.university_name?.website || '#'}" class="text-muted">${item.university_name?.university_name || ''}</a>
                    </div>
                </div>
                <div class="content-part">
                    <ul class="meta-part">
                        <li><i class="fa fa-graduation-cap"></i> <b>Level:</b> ${item.program_level?.name || ''}</li>
                        <li><i class="fa fa-money"></i> <b>Application Fees:</b> $${item.application_fee || '0'}</li>
                        <li><i class="fa fa-clock-o"></i> <b>Duration:</b> ${item.length || ''}</li>
                        <li><i class="fa fa-money"></i> <b>1st Year Tuition Fees:</b> A$${item.tution_fee || '0'}</li>
                    </ul>
                    <small>Fees may vary according to university structure and policy</small>
                    <div class="bottom-part text-end mt-2">
                        <a href="course-details/${item.id}" class="btn btn-outline-primary btn-sm">View Details <i class="flaticon-right-arrow"></i></a>
                    </div>
                </div>
            </div>
        </div><hr class="mt-10">
        `;
    }

    // ---------- AJAX LOADERS ----------
    function loadData(page) {
        $.ajax({
            url: `?page=${page}&${getParams()}`,
            type: 'GET',
            beforeSend: () => $('.ajax-load').show(),
            success: function (res) {
                console.log(res);
                $('.ajax-load').hide();
                lastPage = Math.max(res.data.last_page, res.course_data.last_page);

                $('#university').append(res.data.data.map(renderUniversity).join(''));
                $('.course_data').append(res.course_data.data.map(renderCourse).join(''));

                $('.course_count').text(res.course_data.total);
                $('.university_count').text(res.data.total);
            }
        });
    }

    function lazyLoad(page) {
        return new Promise((resolve) => {
            $.ajax({
                url: `?page=${page}&${getParams()}`,
                type: 'GET',
                success: function (res) {
                    $('.ajax-load').hide();
                    $('#university').append(res.data.data.map(renderUniversity).join(''));
                    $('.course_data').append(res.course_data.data.map(renderCourse).join(''));
                    resolve();
                }
            });
        });
    }

    // ---------- FILTER FUNCTIONS ----------
    window.fetchProgramSubLevel = function () {
        const selected = $("input[name='program_level[]']:checked").map(function () {
            return this.value;
        }).get();

        csrf();
        $.post("{{ route('get-program-sublevel') }}", { program_level_id: selected }, function (data) {
            const selectedIds = @json($program_sub_level_name).map(item => item.id);
            const list = data.length
                ? data.map((lvl, i) => `
                    <li>
                        <label>
                            <input type="checkbox" class="program-sub-level-check" name="program_sub_level[]" value="${lvl.id}" ${selectedIds.includes(lvl.id) ? 'checked' : ''}>
                            ${lvl.name.toUpperCase()}
                        </label>
                    </li>`).join('')
                : '<li><h4>Not Found</h4></li>';
            $('.program-sub-level').html(list);
        });
    };

    window.checkAndCall = function () {
        fetchProgramSubLevel();
    };
    checkAndCall();

    // ---------- EDUCATION LEVEL ----------
    $('#education_level').on('click', function () {
        const programLevels = $("input[name='program_level[]']:checked").map(function () { return this.value; }).get();
        const subLevels = $("input[name='program_sub_level[]']:checked").map(function () { return this.value; }).get();

        csrf();
        $.post("{{ route('get-education-level-filter') }}", { program_level_id: programLevels, program_sublevel_id: subLevels }, function (data) {
            const selectedIds = @json($education_level_name).map(item => item.id);
            const list = data.length
                ? data.map(lvl => `
                    <li>
                        <label>
                            <input type="checkbox" class="education_level_check" name="education_level[]" value="${lvl.id}" ${selectedIds.includes(lvl.id) ? 'checked' : ''}>
                            ${lvl.name.toUpperCase()}
                        </label>
                    </li>`).join('')
                : '<li><label>Not Found</label></li>';
            $('#education-level-list').html(list);
        });
    });

    // ---------- PROGRAM DISCIPLINE ----------
    $(document).on('click', '.subdiscipline', function () {
        const selected = $("input[name='program_discipline[]']:checked").map(function () { return this.value; }).get();
        csrf();
        $.post("{{ route('program-subdiscipline-data') }}", { program_displine: selected }, function (data) {
            const selectedIds = @json($program_sub_discipline_name).map(item => item.id);
            const list = data.length
                ? data.map(d => `
                    <li>
                        <label>
                            <input type="checkbox" class="program-sub-discipline-checkbox" name="program_sub_discipline[]" value="${d.id}" ${selectedIds.includes(d.id) ? 'checked' : ''}>
                            ${d.name.toUpperCase()}
                        </label>
                    </li>`).join('')
                : '<li><label>Not Found</label></li>';
            $('.program_subdiscipline').html(list);
        });
    });

    // ---------- OTHER EXAM ----------
    $('.other_exam').on('click', other_exam);
    other_exam();

    function other_exam() {
        const selected = $("input[name='program_level[]']:checked").map(function () { return this.value; }).get();

        csrf();
        $.post("{{ route('fetch-other-exam-data') }}", { program_id: selected }, function (data) {
            const selectedIds = @json($other_exam_name).map(item => item.id);
            const list = data.map(e => `
                <li>
                    <label>
                        <input type="checkbox" class="other_exam_check" name="other_exam[]" value="${e.id}" ${selectedIds.includes(e.id) ? 'checked' : ''}>
                        ${e.name.toUpperCase()}
                    </label>
                </li>`).join('');
            $('.other_exam_show').html(list);
        });
    }

    // ---------- INITIAL LOAD ----------
  



          


        $(document).ready(function () {
          // Function to collect all selected options (if you need it later)
            function collectSelectedOptions(page = 1) {
                const getCheckedValues = (name) => $(`input[name='${name}[]']:checked`).map(function () {
                    return $(this).val();
                }).get();

                return {
                    program_level: getCheckedValues('program_level'),
                    program_sub_level: getCheckedValues('program_sub_level'),
                    education_level: getCheckedValues('education_level'),
                    program_discipline: getCheckedValues('program_discipline'),
                    program_sub_discipline: getCheckedValues('program_sub_discipline'),
                    other_exam: getCheckedValues('other_exam'),
                    country: getCheckedValues('country'),
                    intake: getCheckedValues('intake'),
                    end_profiency_level: getCheckedValues('end_profiency_level'),
                    schlorship: getCheckedValues('schlorship'),
                    tution_fees: getCheckedValues('tution_fees')
                };
            }

            // Reusable function to handle checkbox filters
            function handleFilterClick(inputName, badgeContainer, urlParamName) {
                const values = $(`input[name='${inputName}[]']:checked`).map(function () {
                    return this.value;
                }).get();

                const labels = $(`input[name='${inputName}[]']:checked`).map(function () {
                    return $(this).closest('label').text().trim();
                }).get();

                // Build URL with updated query param
                let url = window.location.origin + window.location.pathname;
                let params = new URLSearchParams(window.location.search);
                params.delete(urlParamName);

                if (values.length > 0) {
                    params.append(urlParamName, values.join(','));
                    url += '?' + params.toString();
                } else if ([...params].length > 0) {
                    url += '?' + params.toString();
                }

                // Update browser history
                window.history.pushState(null, '', url);

                // Clear and reload UI data
                $('#university').empty();
                $('.course_data').empty();
                loadData(1);

                // Update selected badges
                $(badgeContainer).empty();
                if (labels.length > 0) {
                    labels.forEach(label => {
                        $(badgeContainer).append(`<span class="badge bg-primary">${label}</span>`);
                    });
                }
            }

            // Attach handlers for all filters
            $(document).on('click', '.country-checkbox', function () {
                handleFilterClick('country', '.country_name', 'country');
            });

            $(document).on('click', '.program_level_value', function () {
                handleFilterClick('program_level', '.program_level_name', 'program_level');
            });

            $(document).on('click', '.program-sub-level-check', function () {
                handleFilterClick('program_sub_level', '.program_sub_level_name', 'program_sub_level');
            });

            $(document).on('click', '.education_level_check', function () {
                handleFilterClick('education_level', '.education_level_name', 'education_level');
            });

            $(document).on('click', '.intake-name-data', function () {
                handleFilterClick('intake', '.intake_name', 'intake');
            });

            $(document).on('click', '.program_discipline_checkbox', function () {
                handleFilterClick('program_discipline', '.program_discipline_name', 'program_discipline');
            });

            $(document).on('click', '.program-sub-discipline-checkbox', function () {
                handleFilterClick('program_sub_discipline', '.program_sub_discipline_name', 'program_sub_discipline');
            });

            $(document).on('click', '.eng-pro', function () {
                handleFilterClick('end_profiency_level', '.eng_proficiency_level_name', 'eng_proficiency_level');
            });

            $(document).on('click', '.other_exam_check', function () {
                handleFilterClick('other_exam', '.other_exam_name', 'other_exam');
            });
        });
     loadData(1);
    });
</script>
@endsection
