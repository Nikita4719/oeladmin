@php
$user = Auth::user();
$frenchise = DB::table('agents')->where('email',$user->email)->first();
@endphp
@if($user->hasRole('agent') && $user->is_approve == 0 && $user->is_active == 0 && $frenchise->profile_completed == 0)
    @php
        $make_link_unclickable = 'disabled_link';
    @endphp
    <style>
        .disabled_link {
        pointer-events: none; /* Prevents clicks */
        color: gray; /* Change text color to indicate disabled state */
        cursor: not-allowed; /* Change cursor to indicate the link is not clickable */
        text-decoration: none; /* Remove underline */
    }
    </style>
@endif
<ul class="menu-sub ">
    @if (isset($menu))
        @foreach ($menu as $submenu)
            @if (isset($submenu->name))
                @if (auth()->user()->can($submenu->permission))
                    <li class="menu-item ">
                        @php
                            $currentUrl = app()->environment() === 'local' ? request()->url() : str_replace('http://', 'https://', request()->url());
                            $currentUrl = $currentUrl;
                            $apply_360 = request()->routeIs('apply-360');
                            $isApply360Submenu = $submenu->name === 'oel 360';

                            $sms_template_filter = request()->routeIs('sms-template-filter');
                            $is_sms_template_submenu = $submenu->name === 'Sms Template';

                            // frenchise
                            $frenchise_filter = request()->routeIs('frenchise-filter');
                            $frenchise_submenu = $submenu->name === 'Franchise List';
                            $frenchise_route = request()->routeIs('frenchise-create');
                            $frenchise_edit = request()->routeIs('frenchise-edit');
                            $frenchise_pincode = request()->routeIs('frenchise-pincode');
                            // lead list
                            $edit_leads = request()->routeIs('edit-lead');
                            $show_leads = request()->routeIs('view-lead');
                            $manage_leads = request()->routeIs('manage-lead');
                            $leads_submenu = $submenu->name === 'Leads List';
                            $pending_leads_submenu = $submenu->name === 'Pending Lead';
                            $pending_leads_filter = request()->routeIs('pending-leads-filter');

                            $assi_leads_submenu = $submenu->name === 'Assigned Lead';
                            $assi_leads_filter = request()->routeIs('assigned-leads-filter');
                            // student registration
                            $student_registration_filter = request()->routeIs('student-registration-fees-filter');
                            $student_create = request()->routeIs('create-student-registration-fees');
                            $student_submenu = $submenu->name === 'Student Registration Fees';

                            $student_apply_question = request()->routeIs('student-question-filter');
                            $student_app_submenu = $submenu->name === 'Student Apply Questions';

                            $student_assi_question = request()->routeIs('student-assistance-filter');
                            $student_assi_submenu = $submenu->name === 'Student Assistance';

                            // student guide
                            $student_guide = request()->routeIs('student-guide-filter');
                            $student_guide_menu = $submenu->name === 'Popular Student Guide';
                            $create_student_guide = request()->routeIs('create-student-guide');
                            $edit_student_guide = request()->routeIs('edit-student-guide');

                            // program
                            $approve_program_filter = request()->routeIs('approve-program-filter');
                            $program_filter = request()->routeIs('program-filter');
                            $add_program = request()->routeIs('add-program');
                            $view_program = request()->routeIs('view-program');
                            $edit_program = request()->routeIs('edit-program');
                            $program_menu = $submenu->name === 'Manage Program';
                            // program details
                            $edit_level_details = request()->routeIs('edit-program-level');
                            $add_level_details = request()->routeIs('create-new-program-level');
                            $program_level_details = $submenu->name === 'Program Level Details';

                            // education level
                            $edit_education_level = request()->routeIs('edit-education-level');
                            $add_education_level = request()->routeIs('create-new-education-level');
                            $education_level = $submenu->name === 'Education Level';

                            // program level
                            $edit_program_level = request()->routeIs('edit-program_level');
                            $add_program_level = request()->routeIs('create-new-program_level');
                            $program_level = $submenu->name === 'Program Level';

                            // grade scheme
                            $edit_grade_scheme = request()->routeIs('edit-grading-scheme');
                            $add_grade_level = request()->routeIs('create-new-grading-scheme');
                            $grade_scheme = $submenu->name === 'Grading Scheme';
                            //exam
                            $edit_exam = request()->routeIs('edit-exam');
                            $add_exam = request()->routeIs('create-exam');
                            $exam = $submenu->name === 'Other Exams';

                            //field of study
                            $edit_field_of_study = request()->routeIs('create-field-of-study');
                            $add_field_of_study = request()->routeIs('edit-field-of-study');
                            $field_of_study = $submenu->name === 'Degree Type';
                            //subject
                            $edit_subjects = request()->routeIs('create-subjects');
                            $add_subjects = request()->routeIs('edit-subject');
                            $subjects = $submenu->name === 'Subjects';

                            // university
                            $add_university = request()->routeIs('add-university');
                            $edit_university = request()->routeIs('edit-university');
                            $university = $submenu->name === 'Manage University';

                            // review
                            $add_review = request()->routeIs('add-review');
                            $edit_review = request()->routeIs('edit-review');
                            $review = $submenu->name === 'Oel Review';
                            // unviersity type
                            $add_type_university = request()->routeIs('add-type');
                            $edit_type_university = request()->routeIs('edit-type');
                            $type_university = $submenu->name === 'University Type';

                            // specilization
                            $add_specializations = request()->routeIs('create-specilization');
                            $edit_specializations = request()->routeIs('edit-specilization');
                            $specializations = $submenu->name === 'Specializations';
                            // source
                            $add_source = request()->routeIs('create-source');
                            $edit_source = request()->routeIs('edit-source');
                            $source = $submenu->name === 'Source';
                            // interested
                            $add_interested = request()->routeIs('create-interested');
                            $edit_interested = request()->routeIs('edit-interested');
                            $interested = $submenu->name === 'Interested';
                            // country
                            $add_country = request()->routeIs('create-country');
                            $edit_country = request()->routeIs('edit-country');
                            $country = $submenu->name === 'Country';
                            // provience
                            $add_province = request()->routeIs('create-province');
                            $edit_province = request()->routeIs('edit-province');
                            $province = $submenu->name === 'Province';
                            // visa type
                            $add_visa_type = request()->routeIs('create-visa-type');
                            $edit_visa_type = request()->routeIs('edit-visa-type');
                            $visa_type = $submenu->name === 'Visa Type';
                            // faq
                            $add_faq = request()->routeIs('create-faq');
                            $edit_faq = request()->routeIs('edit-faq');
                            $faq = $submenu->name === 'FAQs';
                            // vas serviece
                            $add_vas_service = request()->routeIs('create-vas-service');
                            $edit_vas_service = request()->routeIs('edit-vas-service');
                            $vas_service = $submenu->name === 'Vas Services';
                            // education lane
                            $add_education_lane = request()->routeIs('create-education-lane');
                            $edit_education_lane = request()->routeIs('edit-education-lane');
                            $education_lane = $submenu->name === 'Education Lane';
                            // testimonial
                            $add_testi = request()->routeIs('create-testimonial');
                            $edit_testi = request()->routeIs('edit-testimonial');
                            $testi = $submenu->name === 'Testimonial';
                            // blogs
                            $add_blogs = request()->routeIs('create-blogs');
                            $edit_blogs = request()->routeIs('edit-blogs');
                            $blogs = $submenu->name === 'Blogs';
                            // user
                            $add_user = request()->routeIs('users.create');
                            $edit_user = request()->routeIs('users.edit');
                            $user = $submenu->name === 'Admin User';
                            // role
                            $add_role = request()->routeIs('roles-permissions.create');
                            $edit_role = request()->routeIs('roles-permissions.edit');
                            $role = $submenu->name === 'Roles Permissions';
                            // sms template
                            $add_sms_template = request()->routeIs('create-sms-template');
                            $edit_sms_template = request()->routeIs('edit-sms-template');
                            $sms_template = $submenu->name === 'Sms Template';
                            // student registration
                            $add_student_assistance= request()->routeIs('create-student-assistance');
                            $edit_student_assistance= request()->routeIs('edit-student-assistance');
                            $student_assistance= $submenu->name === 'Student Assistance';
                            // eng-proficiency-level
                            $add_eng_proficiency_level= request()->routeIs('create-eng-proficiency-level');
                            $edit_eng_proficiency_level= request()->routeIs('edit-eng-proficiency-level');
                            $eng_proficiency_level= $submenu->name === 'Eng Proficiency Level';
                               //program displine
                            $add_program_discipline= request()->routeIs('create-program-discipline');
                            $edit_program_discipline= request()->routeIs('edit-program-discipline');
                            $program_discipline= $submenu->name === 'Program Discipline';
                                //program subdispline
                            $add_program_subdiscipline= request()->routeIs('create-program-subdiscipline');
                            $edit_program_subdiscipline= request()->routeIs('edit-program-subdiscipline');
                            $program_sdiscipline= $submenu->name === 'Program SubDiscipline';
                            // program subdispline
                            $add_program_sublevel= request()->routeIs('create-new-program-sub-level');
                            $edit_program_sublevel= request()->routeIs('edit-program-sub-level');
                            $program_sublevel= $submenu->name === 'Program Sub Level';

                            $add_ads= request()->routeIs('create.ads');
                            $edit_ads= request()->routeIs('edit.ads');
                            $ads= $submenu->name === 'Ads';

                            $add_slider= request()->routeIs('create.slider');
                            $edit_slider= request()->routeIs('edit.slider');
                            $show_slider= request()->routeIs('show.slider');
                            $slider= $submenu->name === 'Slider';

                            $add_about_country= request()->routeIs('create.country.university');
                            $edit_about_country= request()->routeIs('edit.country.university');
                            $about_country= $submenu->name === 'About Country';

                            $create_program_details= request()->routeIs('create-new-program-details');
                            $edit_program_details= request()->routeIs('edit-program-details');
                            $program_Details= $submenu->name === 'Program Level Details';

                            $create_master_service= request()->routeIs('create-master-service');
                            $edit_master_service= request()->routeIs('edit-master-service');
                            $master_service= $submenu->name === 'Master Service';

                            $create_visa_document= request()->routeIs('create-visa-document-type');
                            $edit_visa_document= request()->routeIs('edit-visa-document-type');
                            $visa_document_type= $submenu->name === 'Visa Document Type';

                            $create_sub_visa_document= request()->routeIs('create-visa-sub-document-type');
                            $edit_sub_visa_document= request()->routeIs('edit-visa-sub-document-type');
                            $visa_sub_document_type= $submenu->name === 'Visa SubDocument Type';
                            // data
                            $create_learning_student= request()->routeIs('learning-student.create');
                            $edit_learning_student= request()->routeIs('learning-student.edit');
                            $learning_student= $submenu->name === 'Student';

                            $create_learning_franchise= request()->routeIs('learning-franchise.create');
                            $edit_learning_franchise= request()->routeIs('learning-franchise.edit');
                            $learning_franchise= $submenu->name === 'Franchise';

                            $create_learning_agent= request()->routeIs('learning-agent.create');
                            $edit_learning_agent= request()->routeIs('learning-agent.edit');
                            $learning_agent= $submenu->name === 'Agent';

                        @endphp

                        <a href="{{ isset($submenu->url) ? url($submenu->url) : '#' }}" class=" {{$make_link_unclickable ?? null}} {{ isset($submenu->submenu) ? 'menu-link menu-toggle' : 'menu-link ' }} {{ ($isApply360Submenu && $apply_360) ||
                            (($frenchise_submenu && ($frenchise_filter || $frenchise_route || $frenchise_edit || $frenchise_pincode)) ||
                                (($approve_program_filter || $add_program || $edit_program || $program_filter || $view_program) && $program_menu) ||
                                (($student_registration_filter || $student_create) && $student_submenu) ||
                                (($edit_program_details || $create_program_details) && $program_Details) ||
                                (($edit_ads || $add_ads) && $ads) ||
                                (($edit_learning_franchise || $create_learning_franchise) && $learning_franchise) ||
                                (($edit_learning_agent || $create_learning_agent) && $learning_agent) ||
                                (($edit_learning_student || $create_learning_student) && $learning_student) ||
                                (($edit_visa_document || $create_visa_document) && $visa_document_type) ||
                                (($edit_sub_visa_document || $create_sub_visa_document) && $visa_sub_document_type) ||
                                (($edit_master_service || $create_master_service) && $master_service) ||
                                (($edit_slider || $add_slider  || $show_slider) && $slider) ||
                                (($edit_about_country || $add_about_country) && $about_country) ||
                                ($student_guide_menu && ($student_guide || $create_student_guide || $edit_student_guide)) ||
                                ($pending_leads_submenu && $pending_leads_filter) ||
                                ($assi_leads_submenu && $assi_leads_filter) ||
                                ($sms_template && ($edit_sms_template || $add_sms_template)) ||
                                ($program_sublevel && ($edit_program_sublevel || $add_program_sublevel)) ||
                                ($program_sdiscipline && ($edit_program_subdiscipline || $add_program_subdiscipline)) ||
                                ($program_discipline && ($edit_program_discipline || $add_program_discipline)) ||
                                ($eng_proficiency_level && ($edit_eng_proficiency_level || $add_eng_proficiency_level)) ||
                                ($student_assistance && ($edit_student_assistance || $add_student_assistance)) ||
                                ($role && ($edit_role || $add_role)) ||
                                ($user && ($edit_user || $add_user)) ||
                                ($faq && ($add_faq || $edit_faq)) ||
                                ($blogs && ($add_blogs || $edit_blogs)) ||
                                ($testi && ($add_testi || $edit_testi)) ||
                                ($education_lane && ($edit_education_lane || $add_education_lane)) ||
                                ($vas_service && ($edit_vas_service || $add_vas_service)) ||
                                ($province && ($add_province || $edit_province)) ||
                                ($visa_type && ($add_visa_type || $edit_visa_type)) ||
                                ($program_level_details && ($add_level_details || $edit_level_details)) ||
                                ($specializations && ($add_specializations || $edit_specializations)) ||
                                ($country && ($add_country || $edit_country)) ||
                                ($source && ($edit_source || $add_source)) ||
                                ($interested && ($add_interested || $edit_interested)) ||
                                ($education_level && ($add_education_level || $edit_education_level)) ||
                                ($type_university && ($edit_type_university || $add_type_university)) ||
                                ($program_level && ($add_program_level || $edit_program_level)) ||
                                ($grade_scheme && ($add_grade_level || $edit_grade_scheme)) ||
                                ($university && ($add_university || $edit_university)) ||
                                ($exam && ($add_exam || $edit_exam)) ||
                                ($review && ($add_review || $edit_review)) ||
                                ($field_of_study && ($edit_field_of_study || $add_field_of_study)) ||
                                ($subjects && ($edit_subjects || $add_subjects)) ||
                                ($student_apply_question && $student_app_submenu) ||
                                ($student_assi_question && $student_assi_submenu) ||
                                ($leads_submenu && ($manage_leads || $show_leads || $edit_leads)))
                                ? 'active bg-light text-dark text-decoration-none'
                                : '' }} {{ $currentUrl === url($submenu->url) ? 'active bg-light text-dark text-decoration-none' : '' }}"
                            @if (isset($submenu->target) and !empty($submenu->target)) target="_blank" @endif>
                            @if (isset($submenu->icon))
                                <i class="{{ $submenu->icon }}"></i>
                            @endif

                            <div>{{ isset($submenu->name) ? __($submenu->name) : '' }}</div>
                        </a>
                        {{-- submenu --}}
                        @if (isset($submenu->submenu))
                            @include('layouts.sections.menu.submenu', ['menu' => $submenu->submenu])
                        @endif
                    </li>
                @endif
            @else
                {{ '' }}
            @endif
        @endforeach
    @endif
</ul>
