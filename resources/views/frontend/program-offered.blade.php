@extends('frontend.layouts.main')
@section('title', 'Offered Program')
@section('content')
<style>

        .pricing-wrapper {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }

        .pricing-box {
            flex: 1;
            min-width: 250px;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            overflow: hidden;
        }

        .pricing-header {
            background: #f8f9fa;
            padding: 15px;
            border-bottom: 1px solid #e0e0e0;
        }

        .pricing-content {
            height: 200px;
            overflow-y: auto;
            padding: 20px !important;
            margin: 0;
            list-style: none;
            /* Styling the scrollbar */
            scrollbar-width: thin;
            scrollbar-color: #888 #f1f1f1;
        }

        /* Custom scrollbar for Webkit browsers */
        .pricing-content::-webkit-scrollbar {
            width: 6px;
        }

        .pricing-content::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        .pricing-content::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 3px;
        }

        .pricing-footer {
            padding: 15px;
            background: #f8f9fa;
            border-top: 1px solid #e0e0e0;
        }

        @media (max-width: 426px) {
            .program--bottom {
                margin-bottom: 20px;
            }
        }
    </style>
    <section>
        <div class="university_title">
            <div class="container">
                <div class="row ">
                    <div class="col-lg-12 col-mg-12 col-xs-12 col-sm-12">                       
                        <div class="universities_heading text-center">
                            <h1 class="fw-bold mx_rounded text-black">Pick Your Program Specialization</h1>
                        </div>
                        <div class="serch-bar-title">
                        <nav class="navbar navbar-light ">
                        
                        </nav>
                        </div>
                    </div>
                    <div class="main_col_design_edu ">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="int_cheating_role border rounded">
                                    <div class="img_ab_cirle position-relative">
                                        <div class="position_cl position-absolute">
                                            <img src="{{ asset('frontend/img/Background 57.png') }}" alt="bc">
                                        </div>
                                    </div>
                                    <div class="sep mx-auto mt-4"></div>
                                    <div class="agriculture_title">
                                        <div class="agri_sub p-2">
                                            <h3 class="fw-bold text-center">Agriculture & Veterinary Medicine</h3>
                                            <P class="text-center mt-3 fw-medium">Subject Includes</P>
                                            <ul class="pricing-content">
                                                <li>
                                                   <a href="{{url('programs?program_id=Agriculture')}}"><i class="fa fa-angle-double-right"></i>Agriculture</a>
                                                </li>
                                                <li>
                                                   <a href="{{url('programs?program_id=Farm Management')}}"><i class="fa fa-angle-double-right"></i>Farm Management</a>
                                                </li>
                                                <li>
                                                   <a href="{{url('programs?program_id=Horticulture')}}"><i class="fa fa-angle-double-right"></i>Horticulture</a>
                                                </li>
                                                <li>
                                                   <a href="{{url('programs?program_id=Plant and Crop Sciences')}}"><i class="fa fa-angle-double-right"></i>Plant and Crop Sciences</a>
                                                </li>
                                                <li>
                                                   <a href="{{url('programs?program_id=Veterinary Medicine')}}"><i class="fa fa-angle-double-right"></i>Veterinary Medicine</a>
                                                </li>
                                             </ul>
                                        </div>
                                        <div class="circle_img position-relative">
                                            <div class="img_child_img position-absolute left-0 bottom-0">
                                                <img src="{{ asset('frontend/img/Background 56.png') }}" alt="bc">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 ">
                                <div class="int_cheating_role border rounded">
                                    <div class="img_ab_cirle position-relative">
                                        <div class="position_cl position-absolute">
                                            <img src="{{ asset('frontend/img/Background 57.png') }}" alt="bc">
                                        </div>
                                    </div>
                                    <div class="sep mx-auto mt-4"></div>
                                    <div class="agriculture_title">
                                        <div class="agri_sub p-2">
                                            <h3 class="fw-bold text-center">Applied & Pure Sciences</h3>
                                            <P class="text-center mt-3 fw-medium">Subject Includes</P>
                                            <ul class="pricing-content">
                                                <li>
                                                    <a href="{{ url('programs?program_id=Astronomy') }}"><i
                                                            class="fa fa-angle-double-right"></i>Astronomy</a>
                                                </li>
                                                <li>
                                                    <a href="{{ url('programs?program_id=Biology') }}"><i
                                                            class="fa fa-angle-double-right"></i>Biology</a>
                                                </li>
                                                <li>
                                                    <a
                                                        href="{{ url('programs?program_id=Biomedical Sciences') }}"><i
                                                            class="fa fa-angle-double-right"></i>Biomedical Sciences</a>
                                                </li>
                                                <li>
                                                    <a href="{{ url('programs?program_id=Chemistry') }}"><i
                                                            class="fa fa-angle-double-right"></i>Chemistry</a>
                                                </li>
                                                <li>
                                                    <a href="{{ url('programs?program_id=Earth Sciences') }}"><i
                                                            class="fa fa-angle-double-right"></i>Earth Sciences</a>
                                                </li>
                                                <li>
                                                    <a
                                                        href="{{ url('programs?program_id=Environmental Sciences') }}"><i
                                                            class="fa fa-angle-double-right"></i>Environmental Sciences</a>
                                                </li>
                                                <li>
                                                    <a
                                                        href="{{ url('programs?program_id=Food Science &amp; Technology') }}"><i
                                                            class="fa fa-angle-double-right"></i>Food Science &amp;
                                                        Technology</a>
                                                </li>
                                                <li>
                                                    <a href="{{ url('programs?program_id=General Sciences') }}"><i
                                                            class="fa fa-angle-double-right"></i>General Sciences</a>
                                                </li>
                                                <li>
                                                    <a href="{{ url('programs?program_id=Life Sciences') }}"><i
                                                            class="fa fa-angle-double-right"></i>Life Sciences</a>
                                                </li>
                                                <li>
                                                    <a
                                                        href="{{ url('programs?program_id=Materials Sciences') }}"><i
                                                            class="fa fa-angle-double-right"></i>Materials Sciences</a>
                                                </li>
                                                <li>
                                                    <a href="{{ url('programs?program_id=Mathematics') }}"><i
                                                            class="fa fa-angle-double-right"></i>Mathematics</a>
                                                </li>
                                                <li>
                                                    <a
                                                        href="{{ url('programs?program_id=Physical Geography') }}"><i
                                                            class="fa fa-angle-double-right"></i>Physical Geography</a>
                                                </li>
                                                <li>
                                                    <a href="{{ url('programs?program_id=Physics') }}"><i
                                                            class="fa fa-angle-double-right"></i>Physics</a>
                                                </li>
                                                <li>
                                                    <a href="{{ url('programs?program_id=Sports Science') }}"><i
                                                            class="fa fa-angle-double-right"></i>Sports Science</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="circle_img position-relative">
                                            <div class="img_child_img position-absolute left-0 bottom-0">
                                                <img src="{{ asset('frontend/img/Background 56.png') }}" alt="bc">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 ">
                                <div class="int_cheating_role border rounded">
                                    <div class="img_ab_cirle position-relative">
                                        <div class="position_cl position-absolute">
                                            <img src="{{ asset('frontend/img/Background 57.png') }}" alt="bc">
                                        </div>
                                    </div>
                                    <div class="sep mx-auto mt-4"></div>
                                    <div class="agriculture_title">
                                        <div class="agri_sub p-2">
                                            <h3 class="fw-bold text-center">Creative Arts & Design</h3>
                                            <P class="text-center mt-3 fw-medium">Subject Includes</P>
                                            <ul class="pricing-content">
                                                <li>
                                                    <a href="{{ url('programs?program_id=Art') }}"><i
                                                            class="fa fa-angle-double-right"></i>Art</a>
                                                </li>
                                                <li>
                                                    <a
                                                        href="{{ url('programs?program_id=Art Administration') }}"><i
                                                            class="fa fa-angle-double-right"></i>Art Administration</a>
                                                </li>
                                                <li>
                                                    <a href="{{ url('programs?program_id=Crafts') }}"><i
                                                            class="fa fa-angle-double-right"></i>Crafts</a>
                                                </li>
                                                <li>
                                                    <a
                                                        href="{{ url('programs?program_id=Fashion and Textile Design') }}"><i
                                                            class="fa fa-angle-double-right"></i>Fashion and Textile
                                                        Design</a>
                                                </li>
                                                <li>
                                                    <a href="{{ url('programs?program_id=Graphic Design') }}"><i
                                                            class="fa fa-angle-double-right"></i>Graphic Design</a>
                                                </li>
                                                <li>
                                                    <a
                                                        href="{{ url('programs?program_id=Industrial Design') }}"><i
                                                            class="fa fa-angle-double-right"></i>Industrial Design</a>
                                                </li>
                                                <li>
                                                    <a href="{{ url('programs?program_id=Interior Design') }}"><i
                                                            class="fa fa-angle-double-right"></i>Interior Design</a>
                                                </li>
                                                <li>
                                                    <a href="{{ url('programs?program_id=Music') }}"><i
                                                            class="fa fa-angle-double-right"></i>Music</a>
                                                </li>
                                                <li>
                                                    <a
                                                        href="{{ url('programs?program_id=Non-industrial Design') }}"><i
                                                            class="fa fa-angle-double-right"></i>Non-industrial Design</a>
                                                </li>
                                                <li>
                                                    <a
                                                        href="{{ url('programs?program_id=Theatre and Drama Studies') }}"><i
                                                            class="fa fa-angle-double-right"></i>Theatre and Drama
                                                        Studies</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="circle_img position-relative">
                                            <div class="img_child_img position-absolute left-0 bottom-0">
                                                <img src="{{ asset('frontend/img/Background 56.png') }}" alt="bc">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="main_col_design_edu mt-4">
                                <div class="row">
                                    <div class="col-lg-4 ">
                                        <div class="int_cheating_role border rounded">
                                            <div class="img_ab_cirle position-relative">
                                                <div class="position_cl position-absolute">
                                                    <img src="{{ asset('frontend/img/Background 57.png') }}"
                                                        alt="bc">
                                                </div>
                                            </div>
                                            <div class="sep mx-auto mt-4"></div>
                                            <div class="agriculture_title">
                                                <div class="agri_sub p-2">
                                                    <h3 class="fw-bold text-center">Social Studies & Media</h3>
                                                    <p class="text-center mt-3 fw-medium">Subject Includes</p>
                                                    <ul class="pricing-content">
                                                        <li>
                                                            <a
                                                                href="{{ url('programs?program_id=Anthropology') }}"><i
                                                                    class="fa fa-angle-double-right"></i>Anthropology</a>
                                                        </li>
                                                        <li>
                                                            <a
                                                                href="{{ url('programs?program_id=Economics') }}"><i
                                                                    class="fa fa-angle-double-right"></i>Economics</a>
                                                        </li>
                                                        <li>
                                                            <a
                                                                href="{{ url('programs?program_id=Environmental Management') }}"><i
                                                                    class="fa fa-angle-double-right"></i>Environmental
                                                                Management</a>
                                                        </li>
                                                        <li>
                                                            <a
                                                                href="{{ url('programs?program_id=Film &amp; Television') }}"><i
                                                                    class="fa fa-angle-double-right"></i>Film &amp;
                                                                Television</a>
                                                        </li>
                                                        <li>
                                                            <a
                                                                href="{{ url('programs?program_id=Human Geography') }}"><i
                                                                    class="fa fa-angle-double-right"></i>Human
                                                                Geography</a>
                                                        </li>
                                                        <li>
                                                            <a
                                                                href="{{ url('programs?program_id=International Development') }}"><i
                                                                    class="fa fa-angle-double-right"></i>International
                                                                Development</a>
                                                        </li>
                                                        <li>
                                                            <a
                                                                href="{{ url('programs?program_id=International relations') }}"><i
                                                                    class="fa fa-angle-double-right"></i>International
                                                                relations</a>
                                                        </li>
                                                        <li>
                                                            <a
                                                                href="{{ url('programs?program_id=Journalism') }}"><i
                                                                    class="fa fa-angle-double-right"></i>Journalism</a>
                                                        </li>
                                                        <li>
                                                            <a
                                                                href="{{ url('programs?program_id=Library Studies') }}"><i
                                                                    class="fa fa-angle-double-right"></i>Library
                                                                Studies</a>
                                                        </li>
                                                        <li>
                                                            <a
                                                                href="{{ url('programs?program_id=Linguistics') }}"><i
                                                                    class="fa fa-angle-double-right"></i>Linguistics</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ url('programs?program_id=Media') }}"><i
                                                                    class="fa fa-angle-double-right"></i>Media</a>
                                                        </li>
                                                        <li>
                                                            <a
                                                                href="{{ url('programs?program_id=Photography') }}"><i
                                                                    class="fa fa-angle-double-right"></i>Photography</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ url('programs?program_id=Politics') }}"><i
                                                                    class="fa fa-angle-double-right"></i>Politics</a>
                                                        </li>
                                                        <li>
                                                            <a
                                                                href="{{ url('programs?program_id=Public Administration') }}"><i
                                                                    class="fa fa-angle-double-right"></i>Public
                                                                Administration</a>
                                                        </li>
                                                        <li>
                                                            <a
                                                                href="{{ url('programs?program_id=Social Sciences') }}"><i
                                                                    class="fa fa-angle-double-right"></i>Social
                                                                Sciences</a>
                                                        </li>
                                                        <li>
                                                            <a
                                                                href="{{ url('programs?program_id=Social Work') }}"><i
                                                                    class="fa fa-angle-double-right"></i>Social Work</a>
                                                        </li>
                                                        <li>
                                                            <a
                                                                href="{{ url('programs?program_id=Sociology') }}"><i
                                                                    class="fa fa-angle-double-right"></i>Sociology</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ url('programs?program_id=Writing') }}"><i
                                                                    class="fa fa-angle-double-right"></i>Writing</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="circle_img position-relative">
                                                    <div class="img_child_img position-absolute left-0 bottom-0">
                                                        <img src="{{ asset('frontend/img/Background 56.png') }}"
                                                            alt="bc">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 ">
                                        <div class="int_cheating_role border rounded">
                                            <div class="img_ab_cirle position-relative">
                                                <div class="position_cl position-absolute">
                                                    <img src="{{ asset('frontend/img/Background 57.png') }}"
                                                        alt="bc">
                                                </div>
                                            </div>
                                            <div class="sep mx-auto mt-4"></div>
                                            <div class="agriculture_title">
                                                <div class="agri_sub p-2">
                                                    <h3 class="fw-bold text-center">Master of Business Administration</h3>
                                                    <p class="text-center mt-3 fw-medium">Subject Includes</p>
                                                    <ul class="pricing-content">
                                                        <i class="fa fa-angle-double-right d-flex align-items-center gap-2"
                                                            aria-hidden="true">
                                                            <li><a href="{{ url('programs?program_id=MBA') }}">All
                                                                    MBA courses</a></li>
                                                        </i>
                                                    </ul>
                                                </div>
                                                <div class="circle_img position-relative">
                                                    <div class="img_child_img position-absolute left-0 bottom-0">
                                                        <img src="{{ asset('frontend/img/Background 56.png') }}"
                                                            alt="bc">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 ">
                                        <div class="int_cheating_role border rounded">
                                            <div class="img_ab_cirle position-relative">
                                                <div class="position_cl position-absolute">
                                                    <img src="{{ asset('frontend/img/Background 57.png') }}"
                                                        alt="bc">
                                                </div>
                                            </div>
                                            <div class="sep mx-auto mt-4"></div>
                                            <div class="agriculture_title">
                                                <div class="agri_sub p-2">
                                                    <h3 class="fw-bold text-center">Architecture & Construction</h3>
                                                    <p class="text-center mt-3 fw-medium">Subject Includes</p>
                                                    <ul class="pricing-content">
                                                        <li>
                                                            <a
                                                                href="{{ url('programs?program_id=Architecture') }}"><i
                                                                    class="fa fa-angle-double-right"></i>Architecture</a>
                                                        </li>
                                                        <li>
                                                            <a
                                                                href="{{ url('programs?program_id=Built Environment') }}"><i
                                                                    class="fa fa-angle-double-right"></i>Built
                                                                Environment</a>
                                                        </li>
                                                        <li>
                                                            <a
                                                                href="{{ url('programs?program_id=Construction') }}"><i
                                                                    class="fa fa-angle-double-right"></i>Construction</a>
                                                        </li>
                                                        <li>
                                                            <a
                                                                href="{{ url('programs?program_id=Maintenance Services') }}"><i
                                                                    class="fa fa-angle-double-right"></i>Maintenance
                                                                Services</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ url('programs?program_id=Planning') }}"><i
                                                                    class="fa fa-angle-double-right"></i>Planning</a>
                                                        </li>
                                                        <li>
                                                            <a
                                                                href="{{ url('programs?program_id=Property Management') }}"><i
                                                                    class="fa fa-angle-double-right"></i>Property
                                                                Management</a>
                                                        </li>
                                                        <li>
                                                            <a
                                                                href="{{ url('programs?program_id=Surveying') }}"><i
                                                                    class="fa fa-angle-double-right"></i>Surveying</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="circle_img position-relative">
                                                    <div class="img_child_img position-absolute left-0 bottom-0">
                                                        <img src="{{ asset('frontend/img/Background 56.png') }}"
                                                            alt="bc">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="main_col_design_edu mt-4">
                                <div class="row">
                                    <div class="col-lg-4 ">
                                        <div class="int_cheating_role border rounded">
                                            <div class="img_ab_cirle position-relative">
                                                <div class="position_cl position-absolute">
                                                    <img src="{{ asset('frontend/img/Background 57.png') }}"
                                                        alt="bc">
                                                </div>
                                            </div>
                                            <div class="sep mx-auto mt-4"></div>
                                            <div class="agriculture_title">
                                                <div class="agri_sub p-2">
                                                    <h3 class="fw-bold text-center">Business & Management</h3>
                                                    <p class="text-center mt-3 fw-medium">Subject Includes</p>
                                                    <ul class="pricing-content">
                                                        <li>
                                                            <a
                                                                href="{{ url('programs?program_id=Accounting') }}"><i
                                                                    class="fa fa-angle-double-right"></i>Accounting</a>
                                                        </li>
                                                        <li>
                                                            <a
                                                                href="{{ url('programs?program_id=Business Studies') }}"><i
                                                                    class="fa fa-angle-double-right"></i>Business
                                                                Studies</a>
                                                        </li>
                                                        <li>
                                                            <a
                                                                href="{{ url('programs?program_id=E-Commerce') }}"><i
                                                                    class="fa fa-angle-double-right"></i>E-Commerce</a>
                                                        </li>
                                                        <li>
                                                            <a
                                                                href="{{ url('programs?program_id=Entrepreneurship') }}"><i
                                                                    class="fa fa-angle-double-right"></i>Entrepreneurship</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ url('programs?program_id=Finance') }}"><i
                                                                    class="fa fa-angle-double-right"></i>Finance</a>
                                                        </li>
                                                        <li>
                                                            <a
                                                                href="{{ url('programs?program_id=Human Resource Management') }}"><i
                                                                    class="fa fa-angle-double-right"></i>Human Resource
                                                                Management</a>
                                                        </li>
                                                        <li>
                                                            <a
                                                                href="{{ url('programs?program_id=Management') }}"><i
                                                                    class="fa fa-angle-double-right"></i>Management</a>
                                                        </li>
                                                        <li>
                                                            <a
                                                                href="{{ url('programs?program_id=Marketing') }}"><i
                                                                    class="fa fa-angle-double-right"></i>Marketing</a>
                                                        </li>
                                                        <li>
                                                            <a
                                                                href="{{ url('programs?program_id=Office Administration') }}"><i
                                                                    class="fa fa-angle-double-right"></i>Office
                                                                Administration</a>
                                                        </li>
                                                        <li>
                                                            <a
                                                                href="{{ url('programs?program_id=Quality Management') }}"><i
                                                                    class="fa fa-angle-double-right"></i>Quality
                                                                Management</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ url('programs?program_id=Retail') }}"><i
                                                                    class="fa fa-angle-double-right"></i>Retail</a>
                                                        </li>
                                                        <li>
                                                            <a
                                                                href="{{ url('programs?program_id=Transportation &amp; Logistics') }}"><i
                                                                    class="fa fa-angle-double-right"></i>Transportation
                                                                &amp; Logistics</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="circle_img position-relative">
                                                    <div class="img_child_img position-absolute left-0 bottom-0">
                                                        <img src="{{ asset('frontend/img/Background 56.png') }}"
                                                            alt="bc">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 ">
                                        <div class="int_cheating_role border rounded">
                                            <div class="img_ab_cirle position-relative">
                                                <div class="position_cl position-absolute">
                                                    <img src="{{ asset('frontend/img/Background 57.png') }}"
                                                        alt="bc">
                                                </div>
                                            </div>
                                            <div class="sep mx-auto mt-4"></div>
                                            <div class="agriculture_title">
                                                <div class="agri_sub p-2">
                                                    <h3 class="fw-bold text-center">Humanities</h3>
                                                    <p class="text-center mt-3 fw-medium">Subject Includes</p>
                                                    <ul class="pricing-content">
                                                        <li>
                                                            <a
                                                                href="{{ url('programs?program_id=Archaeology') }}"><i
                                                                    class="fa fa-angle-double-right"></i>Archaeology</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ url('programs?program_id=Classics') }}"><i
                                                                    class="fa fa-angle-double-right"></i>Classics</a>
                                                        </li>
                                                        <li>
                                                            <a
                                                                href="{{ url('programs?program_id=Cultural Studies') }}"><i
                                                                    class="fa fa-angle-double-right"></i>Cultural
                                                                Studies</a>
                                                        </li>
                                                        <li>
                                                            <a
                                                                href="{{ url('programs?program_id=English Studies') }}"><i
                                                                    class="fa fa-angle-double-right"></i>English
                                                                Studies</a>
                                                        </li>
                                                        <li>
                                                            <a
                                                                href="{{ url('programs?program_id=General Studies') }}"><i
                                                                    class="fa fa-angle-double-right"></i>General
                                                                Studies</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ url('programs?program_id=History') }}"><i
                                                                    class="fa fa-angle-double-right"></i>History</a>
                                                        </li>
                                                        <li>
                                                            <a
                                                                href="{{ url('programs?program_id=Languages') }}"><i
                                                                    class="fa fa-angle-double-right"></i>Languages</a>
                                                        </li>
                                                        <li>
                                                            <a
                                                                href="{{ url('programs?program_id=Literature') }}"><i
                                                                    class="fa fa-angle-double-right"></i>Literature</a>
                                                        </li>
                                                        <li>
                                                            <a
                                                                href="{{ url('programs?program_id=Museum Studies') }}"><i
                                                                    class="fa fa-angle-double-right"></i>Museum Studies</a>
                                                        </li>
                                                        <li>
                                                            <a
                                                                href="{{ url('programs?program_id=Philosophy') }}"><i
                                                                    class="fa fa-angle-double-right"></i>Philosophy</a>
                                                        </li>
                                                        <li>
                                                            <a
                                                                href="{{ url('programs?program_id=Regional Studies') }}"><i
                                                                    class="fa fa-angle-double-right"></i>Regional
                                                                Studies</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="circle_img position-relative">
                                                    <div class="img_child_img position-absolute left-0 bottom-0">
                                                        <img src="{{ asset('frontend/img/Background 56.png') }}"
                                                            alt="bc">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 ">
                                        <div class="int_cheating_role border rounded">
                                            <div class="img_ab_cirle position-relative">
                                                <div class="position_cl position-absolute">
                                                    <img src="{{ asset('frontend/img/Background 57.png') }}"
                                                        alt="bc">
                                                </div>
                                            </div>
                                            <div class="sep mx-auto mt-4"></div>
                                            <div class="agriculture_title">
                                                <div class="agri_sub p-2">
                                                    <h3 class="fw-bold text-center">Health & Medicine</h3>
                                                    <p class="text-center mt-3 fw-medium">Subject Includes</p>
                                                    <ul class="pricing-content">
                                                        <li>
                                                            <a
                                                                href="{{ url('programs?program_id=Complementary Health') }}"><i
                                                                    class="fa fa-angle-double-right"></i>Complementary
                                                                Health</a>
                                                        </li>
                                                        <li>
                                                            <a
                                                                href="{{ url('programs?program_id=Counselling') }}"><i
                                                                    class="fa fa-angle-double-right"></i>Counselling</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ url('programs?program_id=Dentisry') }}"><i
                                                                    class="fa fa-angle-double-right"></i>Dentisry</a>
                                                        </li>
                                                        <li>
                                                            <a
                                                                href="{{ url('programs?program_id=Health Studies') }}"><i
                                                                    class="fa fa-angle-double-right"></i>Health Studies</a>
                                                        </li>
                                                        <li>
                                                            <a
                                                                href="{{ url('programs?program_id=Health and Safety') }}"><i
                                                                    class="fa fa-angle-double-right"></i>Health and
                                                                Safety</a>
                                                        </li>
                                                        <li>
                                                            <a
                                                                href="{{ url('programs?program_id=Medicine') }}"><i
                                                                    class="fa fa-angle-double-right"></i>Medicine</a>
                                                        </li>
                                                        <li>
                                                            <a
                                                                href="{{ url('programs?program_id=Midwifery') }}"><i
                                                                    class="fa fa-angle-double-right"></i>Midwifery</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ url('programs?program_id=Nursing') }}"><i
                                                                    class="fa fa-angle-double-right"></i>Nursing</a>
                                                        </li>
                                                        <li>
                                                            <a
                                                                href="{{ url('programs?program_id=Nutrition and Health') }}"><i
                                                                    class="fa fa-angle-double-right"></i>Nutrition and
                                                                Health</a>
                                                        </li>
                                                        <li>
                                                            <a
                                                                href="{{ url('programs?program_id=Ophthalmology') }}"><i
                                                                    class="fa fa-angle-double-right"></i>Ophthalmology</a>
                                                        </li>
                                                        <li>
                                                            <a
                                                                href="{{ url('programs?program_id=Pharmacology') }}"><i
                                                                    class="fa fa-angle-double-right"></i>Pharmacology</a>
                                                        </li>
                                                        <li>
                                                            <a
                                                                href="{{ url('programs?program_id=Physiology') }}"><i
                                                                    class="fa fa-angle-double-right"></i>Physiology</a>
                                                        </li>
                                                        <li>
                                                            <a
                                                                href="{{ url('programs?program_id=Physiotherapy') }}"><i
                                                                    class="fa fa-angle-double-right"></i>Physiotherapy</a>
                                                        </li>
                                                        <li>
                                                            <a
                                                                href="{{ url('programs?program_id=Psychology') }}"><i
                                                                    class="fa fa-angle-double-right"></i>Psychology</a>
                                                        </li>
                                                        <li>
                                                            <a
                                                                href="{{ url('programs?program_id=Public Health') }}"><i
                                                                    class="fa fa-angle-double-right"></i>Public Health</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="circle_img position-relative">
                                                    <div class="img_child_img position-absolute left-0 bottom-0">
                                                        <img src="{{ asset('frontend/img/Background 56.png') }}"
                                                            alt="bc">
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

    <section>
       
        <div class="container mt-lg-4">
            <div class="row">
                <div class="col-lg-4 ">
                    <div class="int_cheating_role border rounded">
                        <div class="img_ab_cirle position-relative">
                            <div class="position_cl position-absolute">
                                <img src="{{ asset('frontend/img/Background 57.png') }}" alt="bc">
                            </div>
                        </div>
                        <div class="sep mx-auto mt-4"></div>
                        <div class="agriculture_title">
                            <div class="agri_sub p-2">
                                <h3 class="fw-bold text-center">Law</h3>
                                <p class="text-center mt-3 fw-medium">Subject Includes</p>
                                <ul class="pricing-content">
                                    <li>
                                        <a href="{{ url('programs?program_id=Civil Law') }}"><i
                                                class="fa fa-angle-double-right"></i>Civil Law</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('programs?program_id=Criminal Law') }}"><i
                                                class="fa fa-angle-double-right"></i>Criminal Law</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('programs?program_id=International Law') }}"><i
                                                class="fa fa-angle-double-right"></i>International Law</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('programs?program_id=Legal Advice') }}"><i
                                                class="fa fa-angle-double-right"></i>Legal Advice</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('programs?program_id=Legal Studies') }}"><i
                                                class="fa fa-angle-double-right"></i>Legal Studies</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('programs?program_id=Public Law') }}"><i
                                                class="fa fa-angle-double-right"></i>Public Law</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="circle_img position-relative">
                                <div class="img_child_img position-absolute left-0 bottom-0">
                                    <img src="{{ asset('frontend/img/Background 56.png') }}" alt="bc">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 ">
                    <div class="int_cheating_role border rounded">
                        <div class="img_ab_cirle position-relative">
                            <div class="position_cl position-absolute">
                                <img src="{{ asset('frontend/img/Background 57.png') }}" alt="bc">
                            </div>
                        </div>
                        <div class="sep mx-auto mt-4"></div>
                        <div class="agriculture_title">
                            <div class="agri_sub p-2">
                                <h3 class="fw-bold text-center">Education & Training</h3>
                                <p class="text-center mt-3 fw-medium">Subject Includes</p>
                                <ul class="pricing-content">
                                    <li>
                                        <a href="{{ url('programs?program_id=Adult Education') }}"><i
                                                class="fa fa-angle-double-right"></i>Adult Education</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('programs?program_id=CPD') }}"><i
                                                class="fa fa-angle-double-right"></i>CPD</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('programs?program_id=Career Advice') }}"><i
                                                class="fa fa-angle-double-right"></i>Career Advice</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('programs?program_id=Childhood Education') }}"><i
                                                class="fa fa-angle-double-right"></i>Childhood Education</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('programs?program_id=Coaching') }}"><i
                                                class="fa fa-angle-double-right"></i>Coaching</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('programs?program_id=Education Learning') }}"><i
                                                class="fa fa-angle-double-right"></i>Education Learning</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('programs?program_id=Education Management') }}"><i
                                                class="fa fa-angle-double-right"></i>Education Management</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('programs?program_id=Education Research') }}"><i
                                                class="fa fa-angle-double-right"></i>Education Research</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('programs?program_id=Educational Psychology') }}"><i
                                                class="fa fa-angle-double-right"></i>Educational Psychology</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('programs?program_id=Pedagogy') }}"><i
                                                class="fa fa-angle-double-right"></i>Pedagogy</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('programs?program_id=Special Education') }}"><i
                                                class="fa fa-angle-double-right"></i>Special Education</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('programs?program_id=Specialised Teaching') }}"><i
                                                class="fa fa-angle-double-right"></i>Specialised Teaching</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('programs?program_id=Teacher Training/PGCE') }}"><i
                                                class="fa fa-angle-double-right"></i>Teacher Training/PGCE</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="circle_img position-relative">
                                <div class="img_child_img position-absolute left-0 bottom-0">
                                    <img src="{{ asset('frontend/img/Background 56.png') }}" alt="bc">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="int_cheating_role border rounded">
                        <div class="img_ab_cirle position-relative">
                            <div class="position_cl position-absolute">
                                <img src="{{ asset('frontend/img/Background 57.png') }}" alt="bc">
                            </div>
                        </div>
                        <div class="sep mx-auto mt-4"></div>
                        <div class="agriculture_title">
                            <div class="agri_sub p-2">
                                <h3 class="fw-bold text-center">Personal Care & Fitness</h3>
                                <p class="text-center mt-3 fw-medium">Subject Includes</p>
                                <ul class="pricing-content">
                                    <li>
                                        <a href="{{ url('programs?program_id=Aromatherapy') }}"><i
                                                class="fa fa-angle-double-right"></i>Aromatherapy</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('programs?program_id=Beauty Therapy') }}"><i
                                                class="fa fa-angle-double-right"></i>Beauty Therapy</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('programs?program_id=Hairdressing') }}"><i
                                                class="fa fa-angle-double-right"></i>Hairdressing</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('programs?program_id=Health and Fitness') }}"><i
                                                class="fa fa-angle-double-right"></i>Health and Fitness</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('programs?program_id=Massage') }}"><i
                                                class="fa fa-angle-double-right"></i>Massage</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('programs?program_id=Reflexology') }}"><i
                                                class="fa fa-angle-double-right"></i>Reflexology</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('programs?program_id=Therapeutic') }}"><i
                                                class="fa fa-angle-double-right"></i>Therapeutic</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="circle_img position-relative">
                                <div class="img_child_img position-absolute left-0 bottom-0">
                                    <img src="{{ asset('frontend/img/Background 56.png') }}" alt="bc">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section class="program--bottom">
        <div class="container mt-lg-4 mb-lg-5 mb-md-4">
            <div class="row">
                <div class="col-lg-4 ">
                    <div class="int_cheating_role border rounded">
                        <div class="img_ab_cirle position-relative">
                            <div class="position_cl position-absolute">
                                <img src="{{ asset('frontend/img/Background 57.png') }}" alt="bc">
                            </div>
                        </div>
                        <div class="sep mx-auto mt-4"></div>
                        <div class="agriculture_title">
                            <div class="agri_sub p-2">
                                <h3 class="fw-bold text-center">Travel & Hospitality
                                </h3>
                                <p class="text-center mt-3 fw-medium">Subject Includes</p>
                                <ul class="pricing-content">
                                    <li>
                                        <a href="{{ url('programs?program_id=Aviation') }}"><i
                                                class="fa fa-angle-double-right"></i>Aviation</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('programs?program_id=Catering') }}"><i
                                                class="fa fa-angle-double-right"></i>Catering</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('programs?program_id=Food &amp; Drink Production') }}"><i
                                                class="fa fa-angle-double-right"></i>Food &amp; Drink Production</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('programs?program_id=Hospitality') }}"><i
                                                class="fa fa-angle-double-right"></i>Hospitality</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('programs?program_id=Hotel Management') }}"><i
                                                class="fa fa-angle-double-right"></i>Hotel Management</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('programs?program_id=Leisure Management') }}"><i
                                                class="fa fa-angle-double-right"></i>Leisure Management</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('programs?program_id=Travel and Tourism') }}"><i
                                                class="fa fa-angle-double-right"></i>Travel and Tourism</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="circle_img position-relative">
                                <div class="img_child_img position-absolute left-0 bottom-0">
                                    <img src="{{ asset('frontend/img/Background 56.png') }}" alt="bc">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 ">
                    <div class="int_cheating_role border rounded">
                        <div class="img_ab_cirle position-relative">
                            <div class="position_cl position-absolute">
                                <img src="{{ asset('frontend/img/Background 57.png') }}" alt="bc">
                            </div>
                        </div>
                        <div class="sep mx-auto mt-4"></div>
                        <div class="agriculture_title">
                            <div class="agri_sub p-2">
                                <h3 class="fw-bold text-center">Computer Science & IT</h3>
                                <p class="text-center mt-3 fw-medium">Subject Includes</p>
                                <ul class="pricing-content">
                                    <li>
                                        <a href="{{ url('programs?program_id=Computer Science') }}"><i
                                                class="fa fa-angle-double-right"></i>Computer Science</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('programs?program_id=Computing') }}"><i
                                                class="fa fa-angle-double-right"></i>Computing</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('programs?program_id=Information Technology') }}"><i
                                                class="fa fa-angle-double-right"></i>IT</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('programs?program_id=Multimedia') }}"><i
                                                class="fa fa-angle-double-right"></i>Multimedia</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('programs?program_id=Software') }}"><i
                                                class="fa fa-angle-double-right"></i>Software</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="circle_img position-relative">
                                <div class="img_child_img position-absolute left-0 bottom-0">
                                    <img src="{{ asset('frontend/img/Background 56.png') }}" alt="bc">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 ">
                    <div class="int_cheating_role border rounded">
                        <div class="img_ab_cirle position-relative">
                            <div class="position_cl position-absolute">
                                <img src="{{ asset('frontend/img/Background 57.png') }}" alt="bc">
                            </div>
                        </div>
                        <div class="sep mx-auto mt-4"></div>
                        <div class="agriculture_title">
                            <div class="agri_sub p-2">
                                <h3 class="fw-bold text-center">Engineering</h3>
                                <p class="text-center mt-3 fw-medium">Subject Includes</p>
                                <ul class="pricing-content">
                                    <li>
                                        <a href="{{ url('programs?program_id=Aerospace Engineering') }}"><i
                                                class="fa fa-angle-double-right"></i>Aerospace Engineering</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('programs?program_id=Biomedical Engineering') }}"><i
                                                class="fa fa-angle-double-right"></i>Biomedical Engineering</a>
                                    </li>
                                    <li>
                                        <a
                                            href="{{ url('programs?program_id=Chemical and Materials Engineering') }}"><i
                                                class="fa fa-angle-double-right"></i>Chemical and Materials Engineering</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('programs?program_id=Civil Engineering') }}"><i
                                                class="fa fa-angle-double-right"></i>Civil Engineering</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('programs?program_id=Electrical Engineering') }}"><i
                                                class="fa fa-angle-double-right"></i>Electrical Engineering</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('programs?program_id=Electronic Engineering') }}"><i
                                                class="fa fa-angle-double-right"></i>Electronic Engineering</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('programs?program_id=Environmental Engineering') }}"><i
                                                class="fa fa-angle-double-right"></i>Environmental Engineering</a>
                                    </li>
                                    <li>
                                        <a
                                            href="{{ url('programs?program_id=General Engineering and Technology') }}"><i
                                                class="fa fa-angle-double-right"></i>General Engineering and Technology</a>
                                    </li>
                                    <li>
                                        <a
                                            href="{{ url('programs?program_id=Manufacturing &amp; Production') }}"><i
                                                class="fa fa-angle-double-right"></i>Manufacturing &amp; Production</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('programs?program_id=Marine Engineering') }}"><i
                                                class="fa fa-angle-double-right"></i>Marine Engineering</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('programs?program_id=Mechanical Engineering') }}"><i
                                                class="fa fa-angle-double-right"></i>Mechanical Engineering</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('programs?program_id=Metallurgy') }}"><i
                                                class="fa fa-angle-double-right"></i>Metallurgy</a>
                                    </li>
                                    <li>
                                        <a
                                            href="{{ url('programs?program_id=Mining and Oil &amp; Gas Operations') }}"><i
                                                class="fa fa-angle-double-right"></i>Mining and Oil &amp; Gas
                                            Operations</a>
                                    </li>
                                    <li>
                                        <a
                                            href="{{ url('programs?program_id=Power &amp; Energy Engineering') }}"><i
                                                class="fa fa-angle-double-right"></i>Power &amp; Energy Engineering</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('programs?program_id=Quality Control') }}"><i
                                                class="fa fa-angle-double-right"></i>Quality Control</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('programs?program_id=Structural Engineering') }}"><i
                                                class="fa fa-angle-double-right"></i>Structural Engineering</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('programs?program_id=Telecommunications') }}"><i
                                                class="fa fa-angle-double-right"></i>Telecommunications</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('programs?program_id=Vehicle Engineering') }}"><i
                                                class="fa fa-angle-double-right"></i>Vehicle Engineering</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="circle_img position-relative">
                                <div class="img_child_img position-absolute left-0 bottom-0">
                                    <img src="{{ asset('frontend/img/Background 56.png') }}" alt="bc">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

   

@endsection
