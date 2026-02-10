@extends('frontend.layouts.main')
@section('title', 'Check Eligibility')
@section('frontend-css')
@endsection
@section('content')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="{{asset('frontend/css/custom.css')}}">


<section>
    <div class="gredient--image  gredient-image">
        <div id="container " class="container ">
            <div class="eligible-title">
                <h2 class="text-center pt-3 pb-3">Check My Eligibility</h2>
            </div>
            <div class="progress px-1" style="height: 3px;">
                <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0"
                    aria-valuemax="100"></div>
            </div>
            <div class="step-container d-flex justify-content-between">
                <div class="step-circle" onclick="displayStep(1)">1</div>
                <div class="step-circle" onclick="displayStep(2)">2</div>
                <div class="step-circle" onclick="displayStep(3)">3</div>
                <div class="step-circle" onclick="displayStep(4)">4</div>
                <div class="step-circle" onclick="displayStep(5)">5</div>
                <div class="step-circle" onclick="displayStep(6)">6</div>
                <div class="step-circle" onclick="displayStep(7)">7</div>
                <div class="step-circle" onclick="displayStep(8)">8</div>
            </div>

            <form id="multi-step-form">
                <div class="step step-1">
                   <div class="step-78 text-center">
                    <h2>Current Track: MASTERS</h2>
                    <P>Do you have any work experience?</P>
                    <p>Program Level?</p>
                   </div>
                   <div class="law-title-p d-flex flex-wrap justify-content-center mt-4">
                    @if(isset($program_id->program_label))
                        @foreach ($program_level as $item)
                                <div class="col-md-2 col-6 col-lg-2 text-center px-2 mb-3">
                                    <label class="img-btn">
                                            <input type="radio" name="program_level" class="program_level_data" id="program_level" value="{{ $item->id }}" {{($item->id == $program_id->program_label) ? 'checked' : ''}}/>
                                            <img  class="img-responsive w-50 mx-auto flgimg" program_id="{{ $item->id }}" src="{{ asset('assets/degree.png') }}" alt="Sri Lanka Flag">
                                            <p class="countrypapa text-center"> {{ ucfirst($item->name) }} </p>
                                        </label>
                                </div>
                            @endforeach
                        @else
                         @foreach ($program_level as $item)
                             <div class="col-md-2 col-6 col-lg-2 text-center px-2 mb-3">
                                 <label class="img-btn">
                                         <input type="radio" name="program_level" class="program_level_data" id="program_level" value="{{ $item->id }}" />
                                         <img  class="img-responsive w-50 mx-auto flgimg" program_id="{{ $item->id }}" src="{{ asset('assets/degree.png') }}" alt="Sri Lanka Flag">
                                         <p class="countrypapa text-center"> {{ ucfirst($item->name) }} </p>
                                     </label>
                             </div>
                         @endforeach
                     @endif
                    </div>
                   <div class="d-flex justify-content-between mt-5">
                   <button type="button" class="btn btn-primary prev-step px-4 disabled">Previous</button>
                    <button type="button" class="btn btn-primary next-step px-4 program-level">Next</button>
                </div>
                </div>

                <div class="step step-2">
                    <div class="step-78 text-center">
                        <h2>Current Track: MASTERS</h2>
                        <P>Program SubLevel</P>
                        <ul class="nav nav-tabs intro-tabs tabs-box program-sub-level" id="myTab" role="tablist">

                        </ul>

                       </div>
                       <div class="d-flex justify-content-between mt-5">
                    <button type="button" class="btn btn-primary prev-step">Previous</button>
                    <button type="button" class="btn btn-primary next-step" id="program-sub-level">Next</button>
                    </div>
                </div>


                <div class="step step-3">
                    <div class="step-78 text-center">
                                <h2>Which major do you want to pursue?</h2>
                                <P>Education Level</P>
                                <ul class="nav nav-tabs intro-tabs tabs-box education-level" id="myTabeducation" role="tablist">

                                </ul>
                            </div>
                            <div class="d-flex justify-content-between mt-5">
                            <button type="button" class="btn btn-primary prev-step">Previous</button>
                            <button type="button" class="btn btn-primary next-step program-subdiscipline"  data-url="{{route('program-subdiscipline-data')}}">Next</button>
                    </div>
                </div>
                <div class="step step-4">
                      <div class="step-78 text-center">
                         <h4> Select Program Discipline?</h4>
                       </div>
                       <div class="row ">
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/js/select2.min.js"></script>
                            <select class="js-select2 " multiple="multiple"
                                name="program_displine" id="program_displine" onchange="ajaxRequestprogram($(this).val())">
                                @foreach ($program_discipline as $item)
                                    <option value="{{ $item->id }}">
                                        {{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row mt-3">
                            <h4 class="text-center">Select Program SubDisciplines</h4>
                            <select class="js-select2 program_subdiscipline_list" multiple="multiple"
                                name="program_subdiscipline_list" id="program_subdiscipline_list" >
                            </select>
                        </div>
                    <div class="d-flex justify-content-between mt-5">
                        <button type="button" class="btn btn-primary prev-step">Previous</button>
                        <button type="button" class="btn btn-primary next-step">Next</button>
                    </div>
                </div>
                <div class="step step-5">
                    <div class="step-78 text-center">
                        <h2>Which english language test have you taken OR are planning to take?</h2>
                        <P>Scoring high in language tests increases your options multifold.</P>
                        <ul class="nav nav-tabs intro-tabs tabs-box" id="myTabs" role="tablist">
                            @foreach ($eng_proficiency_level as $item)
                            <li class="nav-item tab-btns">
                                <a class="nav-link tab-btn eng_proficiency_level" data-eng="{{$item->id}}" href="javascript:void(0)"
                                    role="tab" aria-controls="{{$item->name}}" id="{{$item->name}}-name"
                                    onclick="activateTab('{{$item->name}}', this)" data-toggle="tab" aria-selected="true">
                                    {{$item->name}}
                                </a>
                            </li>
                            @endforeach
                        </ul>

                        @foreach ($eng_proficiency_level as $item)
                        <div class="tab-pane tab input-data mt-5" id="{{$item->name}}" role="tabpanel" aria-labelledby="{{$item->name}}-name"  style="display:none;">
                            <div class="content pt-30">
                                <div class="course-overview">
                                    <div class="inner-box">
                                        <input class="form-control" type="text" id="{{$item->name}}-input" name="{{$item->name}}-input" placeholder="Enter Your Score" oninput="validateScore('{{$item->name}}')">
                                        <br>
                                        <p style="text-align: center; color: red;" class="msg-{{$item->name}}"></p>
                                    </div>
                               
                                </div>
                            </div>
                        </div>
                        @endforeach

                        <div class="d-flex justify-content-between mt-2">
                            <button type="button" class="btn btn-primary prev-step">Previous</button>
                            <button type="button" class="btn btn-primary next-step eng-prog-button">Next</button>
                        </div>
                    </div>

                </div>
                <div class="step step-6">
                    <div class="step-78 text-center">
                        <h2>Which academic test have you taken OR are planning to take?</h2>
                        <P>Scoring high in academic tests increases your options multi fold.</P>
                        <ul class="nav nav-tabs other-exam tabs-box " id="myTab" role="tablist">

                        </ul>
                       </div>
                       <div class="tab-content tabs-content" id="myTabContent">
                        <!-- Home Tab -->
                        <div class="tab-pane tab" id="gre" role="tabpanel"
                            aria-labelledby="prod-overview-tab">
                            <div class="content white-bg pt-30">
                                <!-- Application Charges -->
                                <div class="course-overview">
                                    <div class="inner-box">
                                        <input class="from-control" type="text" id="name"
                                            name="name" placeholder="Enter Your Score"
                                            value="">
                                        <br><br>
                                        <p style="text-align: center;color: red"> PTE score must be in
                                            between 10-90</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Description Tab -->
                        <div class="tab-pane tab" id="gmat" role="tabpanel"
                            aria-labelledby="prod-overview-tab">
                            <div class="content white-bg pt-30">
                                <!-- Application Charges -->
                                <div class="course-overview">
                                    <div class="inner-box">
                                        <input class="from-control" type="text" id="name"
                                            name="name" placeholder="Enter Your Score"
                                            value="">
                                        <br><br>
                                        <p style="text-align: center;color: red"> PTE score must be in
                                            between 10-90</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane tab" id="not" role="tabpanel"
                            aria-labelledby="prod-overview-tab">
                            <div class="content white-bg pt-30">
                                <!-- Application Charges -->
                                <div class="course-overview">
                                    <div class="inner-box">
                                        <input class="from-control" type="text" id="name"
                                            name="name" placeholder="Enter Your Score"
                                            value="">
                                        <br><br>
                                        <p style="text-align: center;color: red"> PTE score must be in
                                            between 10-90</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane tab" id="prod-overview2" role="tabpanel"
                                aria-labelledby="prod-overview-tab">
                                <div class="content white-bg pt-30">
                                    <!-- Application Charges -->
                                    <div class="course-overview">
                                        <div class="inner-box">
                                            <input class="from-control" type="text" id="name"
                                                name="name" placeholder="Enter Your Score"
                                                value="">
                                            <br><br>
                                            <p style="text-align: center;color: red"> PTE score must be in
                                                between 10-90</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                       <div class="d-flex justify-content-between mt-5">
                        <button type="button" class="btn btn-primary prev-step">Previous</button>
                        <button type="button" class="btn btn-primary next-step">Next</button>
                    </div>
                </div>
                <div class="step step-7">
  <div class="step-78 opt-group">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10 col-sm-12">
          <label class="wrapper mb-2 text-center" for="states">Do you have passport?</label>
          <div class="button dropdown mb-3">
            <select id="passportSelector">
              <option value="">Select</option>
              <option value="yes">Yes</option>
              <option value="no">No</option>
            </select>
          </div>
        </div>
      </div>

      <div id="additionalSteps" hidden>
        <div class="row justify-content-center mt-3">
          <div class="col-lg-8 col-md-10 col-sm-12">
            <div class="row">
              <div class="col">
                <div class="country-title-trp">
                  <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">country</label>
                    <input type="text" class="form-control hmb-cnt" id="formGroupExampleInput" placeholder="Enter Country" />
                  </div>
                </div>
              </div>

              <div class="col">
                <div class="country-title-trp">
                  <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">Expire Date</label>
                    <input type="date" class="form-control hmb-cnt" id="formGroupExampleInput" placeholder="dd-mm-yy" />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row justify-content-center mt-3">
          <div class="col-lg-8 col-md-10 col-sm-12">
            <div class="country-title-trp">
              <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Visa Type</label>
                <div class="button dropdown">
                  <select id="visaType">
                    <option value="">Select</option>
                    <option value="working">Working Visa</option>
                    <option value="student">Student Visa</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <button type="button" class="btn btn-primary prev-step mt-5">Previous</button>
      <button type="button" class="btn btn-primary next-step float-end mt-5">Next</button>
    </div>
  </div>

  <script>
    document.getElementById('passportSelector').addEventListener('change', function () {
      const additionalSteps = document.getElementById('additionalSteps');
      if (this.value === 'yes') {
        additionalSteps.hidden = false;
      } else {
        additionalSteps.hidden = true;
      }
    });
  </script>
</div>

                <div class="step step-8">
                    <div class="step-78 text-center">
                        <h2> Which country do you wish to
                            pursue your education in?</h2>
                            <section class="flg">
                                <div class="container">
                                    <div class="row">
                                        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/js/select2.min.js"></script>
                                        <select class="js-select2" multiple="multiple" name="country[]"
                                            id="country" onchange="ajaxRequest($(this).val())">
                                            @foreach ($country as $item)
                                                <option value="{{ $item->id }}" {{ isset($student_data->country_id) && $student_data->country_id == $item->id ? 'selected' : '' }}> {{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                {{-- <div id="showDiv" style="display: none; width: 100%">
                                    <div class="row" id="appendImg88">
                                </div> --}}
                                <div class="col-lg-1 col-md-6">
                                </div>
                            </section>
                    </div>
                    <div class="d-flex justify-content-between mt-5">
                        <button type="button" class="btn btn-primary prev-step">Previous</button>
                        <button type="button" class="btn btn-success check-my-eligibility">Check my Eligibility</button>
                    </div>
                </div>
            </form>
        </div>

    </div>
</section>
@endsection
@section('javascript_section')

<script>
    function validateScore(name){
        var score = document.getElementById(name+"-input").value;
        var message = document.querySelector(".msg-"+name);
        if(name=='TOEFL'){
            if(score<0 || score>120){
                message.innerHTML = "TOFEL  score must be in between 0-120";
                $('.eng-prog-button').prop('disabled', true);
            }else{
                message.innerHTML = "";
                $('.eng-prog-button').prop('disabled', false);
            }
        }else if(name=='IELTS'){
            if(score<0 || score>9){
                message.innerHTML = "IELTS  score must be in between 0-9";
                $('.eng-prog-button').prop('disabled', true);
            }else{
                message.innerHTML = "";
                $('.eng-prog-button').prop('disabled', false);
            }
        }else if(name=='PTE'){
            if(score<10 || score>90){
                message.innerHTML = "PTE  score must be in between 10-90";
                $('.eng-prog-button').prop('disabled', true);
            }else{
                message.innerHTML = "";
                $('.eng-prog-button').prop('disabled', false);
            }
        }else if(name=='DET'){
            if(score<10 || score>160){
                message.innerHTML = "DTE  score must be in between 10-160";
                $('.eng-prog-button').prop('disabled', true);
            }else{
                message.innerHTML = "";
                $('.eng-prog-button').prop('disabled', false);
            }
        }else{
            // $('.input-data').addClass('d-none');
        }
    }
</script>
<script>
        var currentStep = 1;
        var updateProgressBar;

        function displayStep(stepNumber) {
            if (stepNumber >= 1 && stepNumber <= 8) {
                // Hide current step
                $(".step-" + currentStep).hide();

                $(".step-circle").css({
                    "background-color": "#fff",
                    "color": "initial"
                });

                // Activate circles up to the selected step
                for (let i = 1; i <= stepNumber; i++) {
                    $(".step-circle:nth-child(" + i + ")").css({
                        "background-color": "#007bff",
                        "color": "white"
                    });
                }

                // Show new step (only if the element exists)
                var $newStep = $(".step-" + stepNumber);
                if ($newStep.length) {
                    $newStep.show();
                }

                currentStep = stepNumber;
                
                // Only call updateProgressBar if it exists
                if (typeof updateProgressBar === 'function') {
                    updateProgressBar();
                }
            }
        }

        $(document).ready(function () {
            // Ensure steps are hidden except the first one
            $('#multi-step-form').find('.step').slice(1).hide();

            $(".next-step").click(function () {
                if (currentStep < 8) {
                    $(".step-" + currentStep).addClass("animate__animated animate__fadeOutLeft");
                    currentStep++;
                    setTimeout(function () {
                        $(".step").removeClass("animate__animated animate__fadeOutLeft").hide();
                        $(".step-" + currentStep).show().addClass("animate__animated animate__fadeInRight");
                        
                        // Reset and update active circles
                        $(".step-circle").css({
                            "background-color": "#fff",
                            "color": "initial"
                        });
                        for (let i = 1; i <= currentStep; i++) {
                            $(".step-circle:nth-child(" + i + ")").css({
                                "background-color": "#007bff",
                                "color": "white"
                            });
                        }
                        
                        // Only call updateProgressBar if it exists
                        if (typeof updateProgressBar === 'function') {
                            updateProgressBar();
                        }
                    }, 500);
                }
            });

            $(".prev-step").click(function () {
                if (currentStep > 1) {
                    $(".step-" + currentStep).addClass("animate__animated animate__fadeOutRight");
                    currentStep--;
                    setTimeout(function () {
                        $(".step").removeClass("animate__animated animate__fadeOutRight").hide();
                        $(".step-" + currentStep).show().addClass("animate__animated animate__fadeInLeft");
                        $(".step-circle").css({
                            "background-color": "#fff",
                            "color": "initial"
                        });
                        for (let i = 1; i <= currentStep; i++) {
                            $(".step-circle:nth-child(" + i + ")").css({
                                "background-color": "#007bff",
                                "color": "white"
                            });
                        }
                        if (typeof updateProgressBar === 'function') {
                            updateProgressBar();
                        }
                    }, 500);
                }
            });

            updateProgressBar = function () {
                var progressPercentage = ((currentStep - 1) / 7) * 100;
                $(".progress-bar").css("width", progressPercentage + "%");
            }
        });    
</script>
<link href="{{asset('assets/css/select2.min.css')}}" rel="stylesheet" />
<script src="{{asset('assets/js/select2.min.js')}}"></script>

<script type="text/javascript">
    $(".js-select2").select2({
        closeOnSelect: false,
        placeholder: "-- Select Option --",
        allowClear: true,
        tags: true, // creates new options on the fly
        templateResult: function(data) {
            if (!data.id) {
                return data.text;
            }
            var $image = $("<img>", {
                class: "select-image",
                src: $(data.element).data("image"),
                width: 24
            });
            var $text = $("<span>", {
                text: " " + data.text
            });
            return $("<span>").append($image).append($text);
        },
        templateSelection: function(data) {
            if (!data.id) {
                return data.text;
            }
            var $image = $("<img>", {
                class: "select-image",
                src: $(data.element).data("image"),
                width: 24
            });
            return $("<span>").append($image).append(" " + data.text);
        }
    });
</script>
<script>
    $(function() {
    $('#colorselector').change(function(){
        $('.colors').hide();
        $('#' + $(this).val()).show();
    });
    });
</script>
<script>
    function csrf(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    }
    function ajaxRequest(id) {
        $('#appendImg88').empty();
        csrf();
        $.ajax({
            url: "{{ route('get-country-flags') }}",
            type: 'POST',
            data: {
                'country_id': id
            },
            success: function(data) {
                $.each(data.country, function(index, country) {
                    $("#showDiv").show();
                    $('#appendImg88').append(
                        `<div class="ml-3" style="width:8vw;height:8vw">
                            <img class="img-responsive w-100" height="200" width="200" src="{{ asset('assets/flags/${country.name}.png') }}" />
                            <p class="countrypapa">${country.name.substring(0, 10)}</p><i class="fa fa-check hidden"></i>
                        </div>`
                    );
                });
            }
        });
        $('input[name="image[]"]').on('change', function() {
            var item = $(this).val();
            var url = "{{ route('get-item-details') }}";
            csrf();
            $.ajax({
                url: url,
                type: "GET",
                data: {
                    item: item,
                },
                success: function(data) {
                    console.log(data);
                }
            });
        });
    }

    $('.program-level').click(function() {
        var selectedOptions = [];
        $('#program_level:checked').each(function() {
            selectedOptions.push($(this).val());
        });
        csrf();
        $.ajax({
            url: "{{ route('get-program-sublevel') }}",
            type: 'POST',
            data: {
                'program_level_id': selectedOptions
            },
            success: function(data) {
                $('.program-sub-level').empty();
                if (data.length > 0) {
                    data.forEach(function(item) {
                    const tabId = item.id;
                    const tabName = item.name;
                    const newTab = `
                        <li class="nav-item tab-btns">
                            <a class="nav-link tab-btn program-sub-level-data " id="prod-overview-tab" data-toggle="tab" href="#prod-overview" role="tab" data-sublevel-id="${tabId}" aria-controls="prod-overview" aria-selected="false">${tabName}</a>
                        </li>
                    `;
                    $('#myTab').append(newTab);
                });
                // setupTabClickHandler();
                } else {
                    $('.program-sub-level').empty().append('<li class="nav-item tab-btns"><h4>Not Found</h4></li>');
                }
            }
        });
    });

    $('#program-sub-level').click(function() {
        var selectedProgramLevelOptions = [];
        $('#program_level:checked').each(function() {
            selectedProgramLevelOptions.push($(this).val());
        });
        var selectedProgramSubLevelOptions = [];
        $('.program-sub-level').find('a.active').each(function() {
            var selectedSubLevelId = $(this).attr('data-sublevel-id');
            selectedProgramSubLevelOptions.push(selectedSubLevelId);
        });
        csrf();
        $.ajax({
            url: "{{ route('get-education-level-data') }}",
            type: 'POST',
            data: {
                'program_level_id': selectedProgramLevelOptions,
                'program_sublevel_id': selectedProgramSubLevelOptions
            },
            success: function(data) {
                if (data.length > 0) {
                    $('.education-level').empty();
                    data.forEach(function(item) {
                    const tabId = item.id;
                    const tabName = item.name;
                    const newTab = `
                        <li class="nav-item tab-btns">
                            <a class="nav-link tab-btn data_education_level " id="prod-overview-tab"
                            data-toggle="tab" href="#prod-overview" role="tab" data-education-level-id="${tabId}"
                             aria-controls="prod-overview" aria-selected="false">${tabName}</a>
                        </li>
                    `;
                    $('#myTabeducation').append(newTab);
                    // setupTabClickHandler();
                    });
                } else {
                    $('.education-level').empty().append('<li class="nav-item tab-btns"><h4>Not Found</h4></li>');
                }
            }
        });
    });
    // function setupTabClickHandler() {
    //     $('.program-sub-level-data').off('click').on('click', function() {
    //         $('.program-sub-level-data').removeClass('active').attr('aria-selected', 'false');
    //         $(this).addClass('active').attr('aria-selected', 'true');
    //     });
    //     $('.data_education_level').off('click').on('click', function() {
    //         $(this).addClass('active').attr('aria-selected', 'true');
    //     });
    // }
</script>
<script>
    function ajaxRequestprogram(ids){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{ route('program-subdiscipline-data') }}",
            method: 'POST',
            data:{program_displine:ids},
            success: function(data) {
                if (data.length > 0) {
                    $('.program_subdiscipline_list').empty();
                    $.each(data, function(index, program_sub_discipline) {
                        $('.program_subdiscipline_list').append(`
                           <option value="${program_sub_discipline.id}">${program_sub_discipline.name}</option>
                        `);
                    });
                } else {
                    $('.program_subdiscipline_list').empty().append('<option class="nav-item tab-btns"><h4>Not Found</h4></option>');
                }
            }
        });
    }

</script>
<script>
     $(document).on('click', '.data-sub-discipline-id', function() {
        $('.data-sub-discipline-id').removeClass('active');
        $(this).addClass('active');
    });
    function validateTOEFLScore() {
        const toeflScore = document.getElementById('toeflScore').value;
        const error = document.getElementById('error');
        if (toeflScore > 120) {
            error.style.display = 'block';
        } else {
            error.style.display = 'none';
        }
    }
    var program_level_id =$('#program_level').val();
    $.ajax({
        url: "{{ route('fetch-other-exam-data') }}",
        type: "POST",
        data:{
            _token: '{{ csrf_token() }}',
            program_id:program_level_id
        },
        success: function(response){
            $.each(response, function(index, value){
                var tab_element = `<li class="nav-item tab-btns">
                                        <a class="nav-link tab-btn other-exam-data" id="prod-overview-tab"
                                            data-other-exam-id="${value.id}"
                                            data-toggle="tab" href="#${value.name}" role="tab"
                                            aria-controls="prod-overview" aria-selected="true">${value.name}</a>
                                    </li>`;
                $('.other-exam').append(tab_element);
            });
        }
    });
    function activateTab(tabName, element) {
        document.querySelectorAll('.input-data').forEach(function (tabContent) {
            tabContent.style.display = 'none';
        });
        document.querySelectorAll('.nav-link').forEach(function (tab) {
            tab.classList.remove('active');
        });
        document.getElementById(tabName).style.display = 'block';
        element.classList.add('active');
    }  
    $(document).on('click', '.other-exam-data', function () {
        $('.other-exam-data').removeClass('active bg-primary');
        $(this).addClass('active bg-primary');
    });
    $(document).on('click', '.program-sub-level-data', function () {
        $('.program-sub-level-data').removeClass('active bg-primary');
        $(this).addClass('active bg-primary');
    });
    $(document).on('click', '.data_education_level', function () {
        $('.data_education_level').removeClass('active bg-primary');
        $(this).addClass('active bg-primary');
    });
    $(document).on('click', '.eng_proficiency_level', function () {
        $('.eng_proficiency_level').removeClass('active bg-primary');
        $(this).addClass('active bg-primary');
    });
    $('.check-my-eligibility').on('click',function(){
        var country = $('#country').val();
        var program_level = $('.program_level_data:checked').val();
        var program_sub_level=$('.program-sub-level-data.bg-primary, .program-sub-level-data.active').attr('data-sublevel-id');
        var education_level = $('.data_education_level.bg-primary, .data_education_level.active').attr('data-education-level-id');
        var program_displine=$('#program_displine').val();
        var eng_pro_input=$('.input-data').val();
        var program_subdispline=$('#program_subdiscipline_list').val();
        var eng_proficiency_level =$('.eng_proficiency_level.active').attr('data-eng');
        var other_exam =$('.other-exam-data.active').attr('data-other-exam-id');
        var redirect_url = '{{ url('apply-program') }}?country='+country+'&program_level='+program_level+'&program_sub_level='+program_sub_level+'&education_level='+education_level+'&program_discipline='+program_displine+'&program_subdispline='+program_subdispline+'&eng_proficiency_level='+eng_proficiency_level+'&eng_pro_input='+eng_pro_input+'&other_exam='+other_exam;
        window.location.href = redirect_url;
    });
</script>
@endsection
