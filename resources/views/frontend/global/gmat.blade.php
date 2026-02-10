@extends('frontend.layouts.main')
@section('title', 'OverseasEducationLane')
@section('content')


    <style type="text/css">
        .search-slt {
            display: block;
            width: 100%;
            font-size: 0.875rem;
            line-height: 1.5;
            color: #55595c;
            background-color: #fff;
            background-image: none;
            border: 1px solid #ccc;
            height: calc(3rem + 2px) !important;
            border-radius: 0;
        }

        /*--------*/
        .consultant-info-div ul {
            list-style: circle;
            padding-left: 20px;
        }

        .consultant-info-div label {
            display: block;
            font-size: 14px;
            color: #9b9b9b;
            font-weight: 500;
        }

        .consultant-info-div span {
            color: #4a4a4a;
            font-weight: 500;
            font-size: 16px;
        }

        .consultant-image {
            border-radius: 50%;
            overflow: hidden;
            margin: 0 auto;
            width: 180px;
            height: 180px;
        }

        textarea {
            height: 100px !important;
        }
    </style>

    <!-- body content start here -->

    <div class="main-content">
        <!-- Breadcrumbs Start -->
        <div class="kf_inr_banner">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <!--KF INR BANNER DES Wrap Start-->
                        <div class="kf_inr_ban_des">
                            <div class="inr_banner_heading">
                                <h3>IELTS Exams</h3>
                            </div>

                            <div class="kf_inr_breadcrumb">
                                <ul>
                                    <li><a href="#">Home</a></li>
                                    <li><a href="#">Act Exams</a></li>
                                </ul>
                            </div>
                        </div>
                        <!--KF INR BANNER DES Wrap End-->
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcrumbs End -->


        <!-- About Section Start -->
        <div id="rs-about" class="rs-popular-courses style3 pb-40 pt-60 md-pt-60 md-pb-30">
            <div class="container">
                <div class="row clearfix">
                    <!-- Content Column -->

                    <!-- Intro Info Tabs-->
                    <div class="col-lg-12" style="overflow-x:overlay">
                        <ul class="nav nav-tabs intro-tabs tabs-box" id="myTab" role="tablist">
                            <li class="nav-item tab-btns">
                                <a class="nav-link tab-btn active" id="prod-overview-tab" data-toggle="tab"
                                    href="#prod-overview" role="tab" aria-controls="prod-overview"
                                    aria-selected="true">Overview</a>
                            </li>
                            <li class="nav-item tab-btns">
                                <a class="nav-link tab-btn" id="prod-curriculum-tab" data-toggle="tab"
                                    href="#prod-curriculum" role="tab" aria-controls="prod-curriculum"
                                    aria-selected="false">Eligibility</a>
                            </li>
                            <li class="nav-item tab-btns">
                                <a class="nav-link tab-btn" id="prod-curriculum-tab" data-toggle="tab" href="#dates"
                                    role="tab" aria-controls="prod-curriculum" aria-selected="false">Dates</a>
                            </li>
                            <li class="nav-item tab-btns">
                                <a class="nav-link tab-btn" id="prod-curriculum-tab" data-toggle="tab" href="#test-center"
                                    role="tab" aria-controls="prod-curriculum" aria-selected="false">Test Center</a>
                            </li>
                            <li class="nav-item tab-btns">
                                <a class="nav-link tab-btn" id="prod-curriculum-tab" data-toggle="tab" href="#registration"
                                    role="tab" aria-controls="prod-curriculum" aria-selected="false">Registration</a>
                            </li>
                            <li class="nav-item tab-btns">
                                <a class="nav-link tab-btn" id="prod-instructor-tab" data-toggle="tab"
                                    href="#prod-instructor" role="tab" aria-controls="prod-instructor"
                                    aria-selected="false">Exam Pattern</a>
                            </li>
                            <li class="nav-item tab-btns">
                                <a class="nav-link tab-btn" id="prod-faq-tab" data-toggle="tab" href="#prod-faq"
                                    role="tab" aria-controls="prod-faq" aria-selected="false">Syllabus</a>
                            </li>
                            <li class="nav-item tab-btns">
                                <a class="nav-link tab-btn" id="prod-faq-tab" data-toggle="tab" href="#tips"
                                    role="tab" aria-controls="prod-faq" aria-selected="false">Tips</a>
                            </li>
                            <li class="nav-item tab-btns">
                                <a class="nav-link tab-btn" id="prod-reviews-tab" data-toggle="tab" href="#practice-test"
                                    role="tab" aria-controls="prod-reviews" aria-selected="false">Practice Test</a>
                            </li>
                            <li class="nav-item tab-btns">
                                <a class="nav-link tab-btn" id="prod-reviews-tab" data-toggle="tab" href="#score"
                                    role="tab" aria-controls="prod-reviews" aria-selected="false">Results and Scores</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-8 md-mb-50">
                        <div class="intro-info-tabs">

                            <div class="tab-content tabs-content" id="myTabContent">
                                <div class="tab-pane tab fade active show" id="prod-overview" role="tabpanel"
                                    aria-labelledby="prod-overview-tab">
                                    <div class="content pt-30 pb-30 pl-30 pr-30 white-bg pb-30 pl-30 pr-30 white-bg">
                                        <!-- Cource Overview -->
                                        <div class="course-overview">
                                            <div>
                                                <p>The GMAT exam is a computer-adaptive test that assesses the candidates'
                                                    analytical writing, quantitative, verbal, and reading skills in standard
                                                    written English. The cost of giving the GMAT Exam is US $250. This test
                                                    is taken to get admission into a graduate management program, such as
                                                    MBA and Masters in Finance related courses in top business schools
                                                    across the world.</p>
                                                <p>In this article, we will inform you about each and every aspect related
                                                    to GMAT covering GMAT Registration to GMAT Exam Structure and more:</p>
                                                <ul>
                                                    <li><a href="#">GMAT Registration</a>&nbsp;</li>
                                                    <li><a href="#">GMAT Scholarships</a></li>
                                                    <li><a href="#">GMAT Preparation tips</a></li>
                                                    <li><a href="#">GMAT Syllabus</a>&nbsp;</li>
                                                    <li><a href="#">GMAT Results and Scores</a></li>
                                                </ul>
                                                <p>Since, 16th April 2018, the Graduate Management Admission Council has
                                                    shortened the GMAT exam by 30 minutes. Now, the exam is of 3 hours and
                                                    30 minutes including test instructions and breaks. The Verbal Reasoning
                                                    and Quantitative sections were shortened by 13 and 10 minutes
                                                    respectively. The&nbsp;<a href="#">Integrated
                                                        Reasoning</a>&nbsp;and&nbsp;
                                                    <a href="#">Analytical Writing Assessment</a>&nbsp;along with the
                                                    Score Preview and the optional break time remained the same. These
                                                    changes do not have any impact on scoring in the shortened&nbsp;
                                                    <a href="#">Verbal Reasoning</a> and&nbsp;<a
                                                        href="#">Quantitative</a>&nbsp;sections as only the unscored
                                                    items have been removed by the GMAC. GMAT has a&nbsp;feature that
                                                    provides candidates with the flexibility to customize their GMAT
                                                    experience by choosing the section order in which they feel most
                                                    comfortable taking the exam.
                                                </p>

                                                <img src="{{ asset('public/home/images/gmat-exam.png') }}">

                                                <h4 class="mt-15">Recent updates in&nbsp;GMAT</h4>
                                                <p><strong>GMAC announces acceptance of the Aadhar Card for the GMAT Online
                                                        Exam:&nbsp;</strong>Indian students are in for a pleasant surprise,
                                                    as GMAC - administrator and owner of the Graduate Management Admission
                                                    Test (GMAT) has announced that they would be accepting Aadhar Card as
                                                    valid ID proof for the GMAT Online exam, starting April 08, 2021.
                                                    However, candidates would be required to validate their identity using
                                                    their Aadhar Card or Passport during the registration process. This
                                                    initiative has been taken by GMAC to make the GMAT exam more accessible
                                                    to a larger student base. However candidates should keep in mind a few
                                                    pointers and they are, candidates would be required to validate their
                                                    Aadhar Card during the online exam registration process,&nbsp;Aadhar
                                                    Card is only being accepted as valid ID proof for appearing for the
                                                    online format of the GMAT test, the GMAT test centre will only accept a
                                                    valid passport as ID proof and the new development comes to effect
                                                    starting April 08, 2021.</p>
                                                <p><strong>CORONAVIRUS/Covid-19 ALERT:</strong>&nbsp;Effective June 11
                                                    candidates taking the&nbsp;<a href="#">GMAT Online exam</a> will
                                                    have a choice of whiteboard options, physical or online. GMAC also
                                                    announced a commitment to maintaining the availability of online GMAT
                                                    exams throughout the COVID-19 pandemic and opened additional online test
                                                    appointments for the GMAT exam currently through July 17. With
                                                    uncertainty persisting in test center availability, GMAC will continue
                                                    to open additional appointment dates as needed and continues to waive
                                                    reschedule and cancel fees across both the online and test center exams
                                                    to offer extended flexibility for test-takers.</p>
                                                <p>Due to the COVID-19 pandemic, GMAC has to suspend test-center based GMAT
                                                    exam for candidates, as worldwide various countries have put
                                                    restrictions on the movement of citizens. On April-15<sup>th</sup>-2020,
                                                    GMAC (Graduate Management Admission Council), administrator of the
                                                    Graduate Management Admission Test (GMAT) announced the release of the
                                                    GMAT Online exam. Know
                                                    <a href="#">all about the GMAT Online Exam from registration to
                                                        test dates to score reporting to retesting here</a>.
                                                </p>
                                                <p><a href="3">Top business schools not insisting on
                                                        GMAT</a>&nbsp;and some even waiving application fees. Universities
                                                    are also extending deadlines, so more students can apply for admissions.
                                                </p>
                                                <h3><strong>Why take the GMAT Exam?</strong></h3>
                                                <img src="{{ asset('public/home/images/why-gmat.png') }}">
                                                <p class="mt-15">It is the most widely accepted exam for MBA admissions
                                                    worldwide. No other exam has as wide acceptability as GMAT, as per the
                                                    GMAC, globally 9 out of 10 MBA enrollments are made through GMAT Score.
                                                    Further, 2,300 + schools accept GMAT Scores for giving admission. Also,
                                                    there are 650 testing centers in 114 countries that administer the GMAT
                                                    Exam.</p>
                                                <h3><span lang="EN-US">GMAT 2021: Key Highlights</span></h3>

                                                <div class="table-responsive mb-15">
                                                    <table class="table-bordered">
                                                        <tbody>
                                                            <tr>
                                                                <td align="left">
                                                                    <h4>Exam Name</h4>
                                                                </td>
                                                                <td align="left">
                                                                    <h4>GMAT</h4>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td align="left">
                                                                    <p>GMAT full form</p>
                                                                </td>
                                                                <td align="left">
                                                                    <p>Graduate Management Admission Test</p>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td align="left">
                                                                    <p>Official Website</p>
                                                                </td>
                                                                <td align="left">
                                                                    <p><a href="https://www.mba.com/"
                                                                            rel="nofollow">https://www.mba.com</a></p>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td align="left">
                                                                    <p>Most popular for</p>
                                                                </td>
                                                                <td align="left">
                                                                    <p>MBA courses outside India,&nbsp;<a
                                                                            href="#">check 500 + colleges on
                                                                            Shiksha</a></p>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td align="left">
                                                                    <p>Also accepted for</p>
                                                                </td>
                                                                <td align="left">
                                                                    <p>MS courses outside India</p>
                                                                    <p>MBA courses in India</p>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td align="left">
                                                                    <p>Conducted by</p>
                                                                </td>
                                                                <td align="left">
                                                                    <p><a href="#">GMAC</a>&nbsp;(Graduate Management
                                                                        Admission Council)</p>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td align="left">
                                                                    <p>Mode of Exam</p>
                                                                </td>
                                                                <td align="left">
                                                                    <p>Computer-based adaptive test</p>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td align="left">
                                                                    <p>GMAT fee</p>
                                                                </td>
                                                                <td align="left">
                                                                    <p>US $250 (INR 18,300 approx)</p>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td align="left">
                                                                    <p>Score Range</p>
                                                                </td>
                                                                <td align="left">
                                                                    <p>Min 200, Max 800</p>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td align="left">
                                                                    <p>GMAT Contact</p>
                                                                </td>
                                                                <td align="left">
                                                                    <p>+91 120-439-7830, 9 a.m. to 6 p.m. Indian Standard
                                                                        Time<br> Fax: +91-120-4001660.<br> Email:&nbsp;<a
                                                                            href="mailto:GMATCandidateServicesAPAC@pearson.com">GMATCandidateServicesAPAC@
                                                                            pearson.com</a></p>
                                                                    <p>https://www.mba.com/service/contact-us.aspx</p>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <h4>What is the Eligibility criteria for the GMAT exam?</h4>
                                                <p>As such, there is no set eligibility criteria set by GMAC, the body
                                                    conducting GMAT for appearing for the GMAT exam. However, one should
                                                    always meet the eligibility criteria set by the university/college one
                                                    aspires to get into after giving the GMAT.</p>
                                                <h3>Age criteria</h3>
                                                <ul>
                                                    <li>The candidate must have completed 18 years of age</li>
                                                    <li>There is no upper age limit for the candidate</li>
                                                    <li>If the candidate is between 13 to 17 years old, they should have
                                                        permission in writing from their parents or legal guardian</li>
                                                </ul>
                                                <h3>Educational qualification</h3>
                                                <ul>
                                                    <li>GMAC has not announced&nbsp;any official statement regarding
                                                        qualification required to appear for GMAT</li>
                                                    <li>Candidates who wish to enroll for an MBA programme should possess a
                                                        graduate degree in any discipline from a recognized university</li>
                                                </ul>
                                                <h4>GMAT Exam Fee: How much the exam cost?</h4>
                                                <p>The application fee for the GMAT exam is $250, which would translate to
                                                    INR 18,300 approximately. Also, if the applicants want to change the
                                                    center or reschedule the test then they will be charged extra.
                                                    Candidates who do not show up for the test will be charged a full GMAT
                                                    exam fee.</p>
                                                <ul>
                                                    <li><strong>GMAT Cancellation Fee:</strong>&nbsp;If you cancel the exam
                                                        1 to 14 days before the test date then you will be charged $200 and
                                                        $50 will be refunded. If you cancel the exam 15 to 60 days prior to
                                                        the appointment then you will be charged $175 and $75 will be
                                                        refunded. And if you cancel the test more than 60 days prior to the
                                                        appointment then you will be charged $150 and will receive $100 as a
                                                        refund. Moreover, the test appointment cannot be canceled or
                                                        modified within 24 hours of the scheduled test and time.</li>
                                                    <li><strong>GMAT Rescheduling Fee:</strong> If you reschedule the exam 1
                                                        to 14 days before the test date, you have to pay US$150. Also, if
                                                        you reschedule the exam 15 to 60 days prior to the appointment then
                                                        you have to pay US$100. If you reschedule the exam more than 60 days
                                                        before the test date then you have to pay US$50.</li>
                                                </ul>
                                                <h4>How to Register for GMAT?</h4>
                                                <p>According to GMAC, you can register for the GMAT exam 6 months before the
                                                    Graduate Management Admission Test date or latest by 24 hours before the
                                                    GMAT exam date, however, the slot is not available at the last moment.
                                                    Therefore, it is suggested to book your preferred slot well before the
                                                    planned exam date.</p>
                                                <p>Ways to register for GMAT:</p>
                                                <ul>
                                                    <li>Online</li>
                                                    <li>Phone</li>
                                                    <li>Postal mail</li>
                                                </ul>
                                                <p>There are six steps to register for the GMAT Exam and also different
                                                    steps to schedule the GMAT exam. You can read the complete steps to <a
                                                        href="#">register for the GMAT Exam here</a>.</p>
                                                <h3>GMAT Exam Dates</h3>
                                                <p>There are no fixed official <a href="#">GMAT dates</a>, you can
                                                    choose any date according to your convenience and availability.&nbsp;In
                                                    case you need to retake the GMAT exam you can do so after 16 days. You
                                                    can take or retake the GMAT exam after every 16 days. You can appear for
                                                    the exam a maximum of five times a year. Ideally, candidates are
                                                    recommended to register themselves two to three months before the exam
                                                    date. If you register online or by phone, you can get yourself
                                                    registered as late as 24 hours before the exam date. But it is safer to
                                                    stick to early registration as you will then have a set schedule to
                                                    prepare for the exam accordingly. Even the coaching institutes recommend
                                                    you to register at the earliest available date so that you have a wide
                                                    window of time to prepare.</p>
                                                <h4>Exam Pattern for GMAT</h4>
                                                <p>The GMAT Exam comprises of four sections:</p>
                                                <ul>
                                                    <li>Analytical Writing</li>
                                                    <li>Integrated Reasoning</li>
                                                    <li>Quantitative Reasoning</li>
                                                    <li>Verbal Reasoning</li>
                                                </ul>
                                                <p><img loading="lazy"
                                                        src="{{ asset('public/mediadata/images/articles/shiksha_1-01.jpg') }}"
                                                        alt="GMAT exam pattern" width="730" height="562"></p>
                                                <p>Also,&nbsp;candidates can avail of two optional eight-minute breaks
                                                    during the exam. Read more about the GMAT Exam Pattern in detail <a
                                                        href="https://overseaseducationlane.com/exams/gmat/exam-pattern"
                                                        target="_blank">here</a>.</p>
                                                <h4>Syllabus of GMAT Exam </h4>
                                                <p>GMAT is a&nbsp;three and a half hours&nbsp;test with a maximum score of
                                                    800 points.&nbsp;The GMAT test the candidate's' abilities on various
                                                    parameters. Further, the GMAT exam has four sections:</p>
                                                <ul>
                                                    <li>Analytical Writing Assessment—measures candidates ability to think
                                                        critically and to communicate their ideas</li>
                                                    <li>Integrated Reasoning—measures candidates ability to analyze data and
                                                        evaluate information presented in multiple formats</li>
                                                    <li>Quantitative Reasoning—measures aspirants ability to analyze data
                                                        and draw conclusions using reasoning skills</li>
                                                    <li>Verbal Reasoning—measures the ability of the candidates to read and
                                                        understand written material, to evaluate arguments, and to correct
                                                        written material to conform to standard written English</li>
                                                </ul>
                                                <p>Read more about the <a
                                                        href="https://overseaseducationlane.com/exams/gmat/syllabus"
                                                        target="_blank">GMAT Syllabus in detail</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="dates" role="tabpanel"
                                    aria-labelledby="prod-curriculum-tab">
                                    <div class="content pt-30 pb-30 pl-30 pr-30 white-bg">
                                        <div class="course-overview">
                                            <div class="#">
                                                <div>
                                                    <p>The Graduate Management Admission Test also known as&nbsp;GMAT is
                                                        mostly taken by the MBA aspirants who wish to study abroad. This
                                                        exam evaluates the candidates on the basis of their&nbsp;<a
                                                            href="https://overseaseducationlane.com/exams/gmat/prep-tips-integrated-reasoning-section"
                                                            target="_blank">Integrated Reasoning</a> skills,&nbsp;<a
                                                            href="https://overseaseducationlane.com/exams/gmat/prep-tips-quantitative-section"
                                                            target="_blank">Quantitative</a> skills,&nbsp;<a
                                                            href="https://overseaseducationlane.com/exams/gmat/prep-tips-verbal-section"
                                                            target="_blank">Verbal</a> skills, and <a
                                                            href="https://overseaseducationlane.com/exams/gmat/prep-tips-analytical-writing-assessment"
                                                            target="_blank">Analytical Writing Assessment</a>. The
                                                        interesting <a
                                                            href="https://overseaseducationlane.com/exams/gmat/exam-pattern"
                                                            target="_blank">structure and&nbsp;pattern</a>&nbsp;of this
                                                        exam make it really tough and exciting at the same time. Due to the
                                                        course structure of this exam, some aspirants often get confused as
                                                        to which exam will fulfill their MBA requirements better: <a
                                                            href="https://overseaseducationlane.com/gre-vs-gmat-which-exam-should-you-take-articlepage-1203"
                                                            target="_blank">GMAT or GRE</a>. It is essential for them to
                                                        understand that the recognised business schools worldwide use the
                                                        GMAT score to evaluate a candidate's profile and conclude their
                                                        admission.</p>
                                                    <p><strong>Quick Links:</strong></p>
                                                    <table class="table-bordered">
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <p><a href="https://overseaseducationlane.com/exams/gmat"
                                                                            target="_blank">About GMAT Exam</a></p>
                                                                </td>
                                                                <td>
                                                                    <p><a href="https://overseaseducationlane.com/exams/gmat/register-for-gmat"
                                                                            target="_blank">GMAT Registration</a></p>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <p><a href="https://overseaseducationlane.com/exams/gmat/important-dates"
                                                                            target="_blank">GMAT Exam Dates</a></p>
                                                                </td>
                                                                <td>
                                                                    <p><a href="https://overseaseducationlane.com/exams/gmat/syllabus"
                                                                            target="_blank">GMAT Syllabus</a></p>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <p><a href="https://overseaseducationlane.com/exams/gmat/results-and-scores"
                                                                            target="_blank">GMAT Scores</a></p>
                                                                </td>
                                                                <td>
                                                                    <p><a href="https://overseaseducationlane.com/exams/gmat/preparation-tips"
                                                                            target="_blank">GMAT Preparation Tips</a></p>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <p>India has been reported to have more than 3 lakh GMAT test-takers
                                                        every year. Taken across the world, this exam comes with a wide
                                                        range of doubts amongst its aspirants. One of the&nbsp;<a
                                                            href="https://overseaseducationlane.com/exams/gmat/faqs-gmat-exam"
                                                            target="_blank">frequently asked questions</a> by the aspirants
                                                        on the&nbsp;<a href="https://overseaseducationlane.com/exams/gmat"
                                                            target="_blank">GMAT Exam</a>&nbsp;is whether they are eligible
                                                        for the exam or not. To resolve this query, we have simplified the
                                                        list of exam requirements as approved by the Graduate Management
                                                        Admission Council (GMAC), the official body that conducts the GMAT
                                                        exam.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="test-center" role="tabpanel"
                                    aria-labelledby="prod-curriculum-tab">
                                    <div class="content pt-30 pb-30 pl-30 pr-30 white-bg">
                                        <div class="course-overview">
                                            <div class="#">
                                                <div>
                                                    <p>The one thing that differentiates GMAT from standardized exams of
                                                        India is the fact that it has no set exam date. You get an option to
                                                        choose from many available dates, which means you get to decide when
                                                        to appear for the <a
                                                            href="https://overseaseducationlane.com/exams/gmat"
                                                            target="_blank">GMAT exam</a>. As the exam is conducted around
                                                        the year, you can appear for the exam at your convenience.</p>
                                                    <h3><strong>Booking Slot</strong>&nbsp;for GMAT</h3>
                                                    <p>It also means you get to decide when to start preparing for the GMAT
                                                        so that you have enough time for preparation. It is recommended that
                                                        you <a
                                                            href="https://overseaseducationlane.com/exams/gmat/register-for-gmat"
                                                            target="_blank">register for the GMAT exam</a>&nbsp;two months
                                                        before the date on which you wish to appear for the exam.</p>
                                                    <h4>Time and Location</h4>
                                                    <p>While selecting an exam date, you can choose the time of either the
                                                        morning slot or the afternoon one. This can vary in the next
                                                        attempt. The availability of GMAT dates depends upon the <a
                                                            href="https://overseaseducationlane.com/exams/gmat/gmat-test-centres-in-india"
                                                            target="_blank">local test centers</a>, thus, it is advised to
                                                        start checking the dates in advance.</p>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="registration" role="tabpanel"
                                    aria-labelledby="prod-curriculum-tab">
                                    <div class="content pt-30 pb-30 pl-30 pr-30 white-bg">
                                        <div class="course-overview">
                                            <div class="#">
                                                <div>
                                                    <p>Every year, around 2 lakh aspirants in India attempt the Graduate
                                                        Management Admission Test (<a
                                                            href="https://overseaseducationlane.com/exams/gmat"
                                                            target="_blank">GMAT Exam</a>). It is obvious for the
                                                        applicants spread across the nation to prefer finding test centres
                                                        closest to their places. This article will help you locate your
                                                        nearest GMAT Test Centre.</p>
                                                    <p>Since this exam can be attempted any time throughout the year, you
                                                        get enough time to <a
                                                            href="https://overseaseducationlane.com/five-elements-every-gmat-study-calendar-needs-articlepage-633"
                                                            target="_blank">create your study calendar</a>&nbsp;and
                                                        accordingly choose the date and location as per your convenience.
                                                        Nevertheless, while <a
                                                            href="https://overseaseducationlane.com/exams/gmat/register-for-gmat"
                                                            target="_blank">booking slot for your GMAT</a>&nbsp;exam 2021
                                                        you need to ensure that the date and time you choose is also
                                                        available at the test centre of your choice.</p>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="prod-curriculum" role="tabpanel"
                                    aria-labelledby="prod-curriculum-tab">
                                    <div class="content">
                                        <div id="accordion" class="accordion-box">
                                            <div
                                                class="content pt-30 pb-30 pl-30 pr-30 white-bg pb-30 pl-30 pr-30 white-bg">
                                                <div>
                                                    <p>GMAT is a management entrance exam conducted&nbsp;round&nbsp;the year
                                                        where the candidates have the flexibility to take the exam on any
                                                        day depending on the availability and time slot. The number
                                                        of&nbsp;<a
                                                            href="https://overseaseducationlane.com/exams/gmat">GMAT</a>&nbsp;applicants
                                                        is increasing immensely every year, and thus, finding the slot
                                                        becomes more difficult every time you wish to appear for the exam.
                                                        You need to make sure that at the time of booking your slot, your
                                                        preferential test center is also available on the chosen date.</p>
                                                    <p><strong>How to Register for GMAT Exam 2021</strong></p>
                                                    <p>The candidates have the liberty of giving the exam anytime in the
                                                        year as per their convenience. The important thing to note is that
                                                        the candidates can reschedule their next attempt only after 16 days
                                                        of taking the first attempt. A candidate is only allowed five
                                                        attempts in one year. Here, are the steps to schedule your exam.</p>
                                                    <p>Steps to register for GMAT 2021:</p>
                                                    <p>Step 1: Visit the official GMAT website,&nbsp;<a
                                                            href="https://www.mba.com/" target="_blank"
                                                            rel="nofollow">mba.com</a></p>
                                                    <p>Step 2: Candidate needs to create his/her account.</p>
                                                    <p><img loading="lazy"
                                                            src="{{ asset('public/mediadata/images/articles/GMAT_regis_step2.png') }}"
                                                            alt="GMAT Registration" width="804" height="426"></p>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="prod-instructor" role="tabpanel"
                                    aria-labelledby="prod-instructor-tab">
                                    <div class="content pt-30 pb-30 pl-30 pr-30 white-bg pb-30 pl-30 pr-30 white-bg">
                                        <div>
                                            <p>The Graduate Management Admission Test (GMAT) is a computer adaptive test
                                                with a total duration of 3 hours and 30 minutes.&nbsp;<a
                                                    href="https://overseaseducationlane.com/exams/gmat"
                                                    target="_blank">The GMAT Exam</a> Pattern is decided by the Graduate
                                                Management Admission Council (GMAC), which is the official exam
                                                administrating body. The GMAT Exam Pattern comprises of both objective and
                                                subjective questions.</p>
                                            <p>Overall the GMAT test has 90 questions which are divided into four sections
                                                namely Analytical Writing Assessment, Integrated Reasoning, Quantitative
                                                Reasoning, and Verbal Reasoning. Further, candidates are given a specific
                                                time to complete every section of the exam.</p>
                                            <p><strong>GMAT 2021 Exam Pattern</strong></p>
                                            <table class="table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <th style="text-align: center;">
                                                            <p><strong>Section</strong></p>
                                                        </th>
                                                        <th style="text-align: center;">
                                                            <p><strong>No. of questions/ Time limit</strong></p>
                                                        </th>
                                                        <th style="text-align: center;">
                                                            <p><strong>Question Type</strong></p>
                                                        </th>
                                                        <th style="text-align: center;">
                                                            <p>Score Range</p>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <p><a href="https://overseaseducationlane.com/exams/gmat/prep-tips-analytical-writing-assessment"
                                                                    target="_blank">Analytical Writing Assessment</a></p>
                                                        </td>
                                                        <td>
                                                            <p>1 Topic (30 minutes)</p>
                                                        </td>
                                                        <td>
                                                            <p>Analysis of an Argument</p>
                                                        </td>
                                                        <td>
                                                            <p>0-6 (0.5-point increments)</p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <p><a href="https://overseaseducationlane.com/exams/gmat/prep-tips-integrated-reasoning-section"
                                                                    target="_blank">Integrated Reasoning</a></p>
                                                        </td>
                                                        <td>
                                                            <p>12 questions (30 minutes)</p>
                                                        </td>
                                                        <td>
                                                            <p>Multi-Source Reasoning,</p>
                                                            <p>Graphics Interpretation,</p>
                                                            <p>Two-Part Analysis,</p>
                                                            <p>Table Analysis</p>
                                                        </td>
                                                        <td>
                                                            <p>1-8 (1-point increments)</p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <p><a href="https://overseaseducationlane.com/exams/gmat/prep-tips-quantitative-section"
                                                                    target="_blank">Quantitative</a></p>
                                                        </td>
                                                        <td>
                                                            <p>31 questions (62&nbsp;minutes)</p>
                                                        </td>
                                                        <td>
                                                            <p>Data Sufficiency,</p>
                                                            <p>Problem Solving</p>
                                                        </td>
                                                        <td>
                                                            <p>6-51 (1-point increments)</p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <p><a href="https://overseaseducationlane.com/exams/gmat/prep-tips-verbal-section"
                                                                    target="_blank">Verbal</a></p>
                                                        </td>
                                                        <td>
                                                            <p>36 questions (65&nbsp;minutes)</p>
                                                        </td>
                                                        <td>
                                                            <p>Reading Comprehension,</p>
                                                            <p>Critical Reasoning,</p>
                                                            <p>Sentence Correction</p>
                                                        </td>
                                                        <td>
                                                            <p>6-51 (1-point increments)</p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <p><strong>Total Exam Duration</strong></p>
                                                        </td>
                                                        <td>&nbsp;</td>
                                                        <td>&nbsp;</td>
                                                        <td>
                                                            <p>3 hours 7 minutes</p>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <p>A candidate has the option to take two '8-minute breaks' during the exam.</p>
                                        </div>

                                    </div>
                                </div>

                                <div class="tab-pane fade" id="prod-faq" role="tabpanel"
                                    aria-labelledby="prod-faq-tab">
                                    <div class="content pt-30 pb-30 pl-30 pr-30 white-bg pb-30 pl-30 pr-30 white-bg">
                                        <div>
                                            <p>GMAT is a&nbsp;three and a half hours&nbsp;test with a maximum score of 800
                                                points. The entire&nbsp;<a
                                                    href="https://overseaseducationlane.com/exams/gmat">GMAT</a>&nbsp;Exam
                                                syllabus divided into four sections.</p>
                                            <p><strong>GMAT Exam syllabus divided into four sections:</strong></p>
                                            <ul>
                                                <li>Analytical&nbsp;Writing</li>
                                                <li>Integrated Reasoning</li>
                                                <li>Quantitative Aptitude Section</li>
                                                <li>Verbal Reasoning Section</li>
                                            </ul>
                                            <h4>GMAT Exam Pattern</h4>
                                            <p>The GMAT exam pattern is divided into four sections Writing, Reasoning,
                                                Verbal and Quantitative skills. Further, the GMAT is a Computer Adaptive
                                                Test of 3 hours 30 minutes and comprises of both objective and subjective
                                                questions. There are a total of 91 questions.</p>
                                            <table class="table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <th style="text-align: center;">
                                                            <p><strong>Section</strong></p>
                                                        </th>
                                                        <th style="text-align: center;">
                                                            <p><strong>Number of Questions</strong></p>
                                                        </th>
                                                        <th style="text-align: center;">
                                                            <p><strong>Score Range</strong></p>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <p><a href="https://overseaseducationlane.com/exams/gmat/prep-tips-analytical-writing-assessment"
                                                                    target="_blank">Analytical Writing
                                                                    Assessment</a>&nbsp;(30 minutes)</p>
                                                        </td>
                                                        <td>
                                                            <p>1 Topic (Essay)</p>
                                                        </td>
                                                        <td>
                                                            <p>0-6</p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <p><a href="https://overseaseducationlane.com/exams/gmat/prep-tips-integrated-reasoning-section"
                                                                    target="_blank">Integrated Reasoning</a>&nbsp;(30
                                                                minutes)</p>
                                                        </td>
                                                        <td>
                                                            <p>12 questions</p>
                                                        </td>
                                                        <td>
                                                            <p>1-8</p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <p><a href="https://overseaseducationlane.com/exams/gmat/prep-tips-quantitative-section"
                                                                    target="_blank">Quantitative</a>&nbsp;(62 minutes)</p>
                                                        </td>
                                                        <td>
                                                            <p>31 questions</p>
                                                        </td>
                                                        <td>
                                                            <p>6-51</p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <p><a href="https://overseaseducationlane.com/exams/gmat/prep-tips-verbal-section"
                                                                    target="_blank">Verbal</a>&nbsp;(65 minutes)</p>
                                                        </td>
                                                        <td>
                                                            <p>36 questions</p>
                                                        </td>
                                                        <td>
                                                            <p>6-51</p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <p>Total Exam Time (3 hours 7 minutes)</p>
                                                        </td>
                                                        <td>&nbsp;</td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <h4><br>GMAT Analytical Writing Assessment Syllabus</h4>
                                            <p>The&nbsp;<a
                                                    href="https://overseaseducationlane.com/gmat-prep-tips-analytical-writing-assessment-articlepage-117"
                                                    target="_blank">Analytical Writing&nbsp;section</a>&nbsp;will have
                                                topics on which the candidate will have to write, or a passage may be given
                                                on which questions will be asked. On the basis of the passage, the candidate
                                                will have to answer. The syllabus for this section is vast and varied as the
                                                topic of the passage could be any topic of interest. The main idea is to
                                                focus on the structure of the answer and not the arguments presented.
                                                Remember, it is not a test of your opinion but your writing style, so it is
                                                safer to stick to a neutral opinion.</p>
                                            <ul>
                                                <li>
                                                    <h3>Argument essay</h3>
                                                    <p>In this section, you have to analyse the reasoning and then present
                                                        your argument. Remember, you will be judged on how well reasoned you
                                                        find a given argument.</p>
                                                </li>
                                            </ul>
                                            <ul>
                                                <li>
                                                    <h3>Issue essay</h3>
                                                    <p>In this section, you have to write an essay on the issue given to
                                                        you. The candidate has to give an opinion in around 600 words. The
                                                        opinion can be supportive of the given statement or candidates can
                                                        give their own opinion. However, make sure to give your opinion in a
                                                        properly structured manner as you will be judged on this basis.</p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="prod-reviews" role="tabpanel"
                                    aria-labelledby="prod-reviews-tab">
                                    <div class="content pt-30 pb-30 pl-30 pr-30 white-bg pb-30 pl-30 pr-30 white-bg">

                                        <div>
                                            <p dir="ltr">Preparing for <a
                                                    href="https://overseaseducationlane.com/exams/gmat"
                                                    target="_blank">GMAT</a>&nbsp;isn't that impossible of a task as it is
                                                made out to be. All you need is a focus and clarity of action. You can
                                                choose to study on your own or you can join a coaching center. Both these
                                                methods work perfectly fine, it all depends on your priorities.</p>
                                            <p dir="ltr">To choose the best method on how to prepare for the GMAT you
                                                first need to look at your criteria and decide accordingly. To be able to
                                                study on your own effectively, you need&nbsp;<a
                                                    href="https://overseaseducationlane.com/exams/gmat/selected-books-and-resources-for-gmat-exam-preparation"
                                                    target="_blank">good GMAT books and resources</a>, along with study
                                                material, motivation, and self-discipline. If time is a constraint and one
                                                needs professional guidance to ensure a competitive edge in GMAT exam
                                                preparation, then join a&nbsp;<a
                                                    href="https://overseaseducationlane.com/how-to-select-the-best-coaching-center-for-gmat-prep-articlepage-458"
                                                    target="_blank">coaching center for&nbsp;GMAT</a>&nbsp;is the better
                                                option.</p>
                                            <h4>GMAT Study Material</h4>
                                            <p>If you take the route of self-study to prepare for GMAT, there are a lot
                                                of&nbsp;<a
                                                    href="https://overseaseducationlane.com/exams/gmat/selected-books-and-resources-for-gmat-exam-preparation"
                                                    target="_blank">books and resources</a>&nbsp;along with study materials
                                                and GMAT study plans available to help you. GMAC has its own official study
                                                guide and free software. Refer to the following GMAT guides and books to
                                                help create a study plan -</p>
                                            <ul>
                                                <li dir="ltr"><a
                                                        href="http://www.mba.com/india/store/store-catalog/gmat-preparation/the-official-guide-for-gmat-review-2015.aspx?CID=5F303BC4-9BE7-4E74-B516-DB456903CDFD"
                                                        target="_blank" rel="nofollow">The Official Guide for GMAT Review,
                                                        2021</a>&nbsp;– This exam guide includes more than 900 questions
                                                    from past GMAT exams, a diagnostic section to help you assess where to
                                                    focus your efforts, and invaluable test-taking tips and strategies to
                                                    help you get the score you want.&nbsp;</li>
                                                <li dir="ltr"><a
                                                        href="http://www.mba.com/india/the-gmat-exam/prepare-for-the-gmat-exam/test-prep-materials/free-gmat-prep-software.aspx"
                                                        target="_blank" rel="nofollow">Free GMATPrep Software</a>&nbsp;–
                                                    this software includes ninety free questions – 30 Quantitative, 45
                                                    Verbal, and 15 Integrated Reasoning – with answers and explanations,
                                                    tools to create your own practice question set, two full-length practice
                                                    tests with answers, etc.</li>
                                                <li dir="ltr"><a
                                                        href="https://www.manhattanprep.com/gmat/store/item/gmat-complete-prep-set/"
                                                        target="_blank" rel="nofollow">Manhattan GMAT Strategy
                                                        Guides</a>&nbsp;- This set includes: GMAT Roadmap; Fractions,
                                                    Decimals, &amp; Percents; Algebra; Word Problems; Geometry; Number
                                                    Properties; Critical Reasoning; Reading Comprehension; Sentence
                                                    Correction; Integrated Reasoning &amp; Essay.</li>
                                                <li dir="ltr"><a
                                                        href="http://www.amazon.in/Kaplan-GMAT-800-Advanced-Students/dp/1419553429"
                                                        target="_blank" rel="nofollow">Kaplan GMAT 800: Advanced Prep for
                                                        Advanced Students</a>&nbsp;- Tips for test-taking, proven strategies
                                                    for getting a perfect score of 800, and focused guidelines for tackling
                                                    each question type all combine for the ideal preparation tool for the
                                                    most ambitious student.</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>




                                <div class="tab-pane fade" id="tips" role="tabpanel"
                                    aria-labelledby="prod-reviews-tab">
                                    <div class="content pt-30 pb-30 pl-30 pr-30 white-bg pb-30 pl-30 pr-30 white-bg">
                                        <div>
                                            <p dir="ltr">Preparing for <a
                                                    href="https://overseaseducationlane.com/exams/gmat"
                                                    target="_blank">GMAT</a>&nbsp;isn't that impossible of a task as it is
                                                made out to be. All you need is a focus and clarity of action. You can
                                                choose to study on your own or you can join a coaching center. Both these
                                                methods work perfectly fine, it all depends on your priorities.</p>
                                            <p dir="ltr">To choose the best method on how to prepare for the GMAT you
                                                first need to look at your criteria and decide accordingly. To be able to
                                                study on your own effectively, you need&nbsp;<a
                                                    href="https://overseaseducationlane.com/exams/gmat/selected-books-and-resources-for-gmat-exam-preparation"
                                                    target="_blank">good GMAT books and resources</a>, along with study
                                                material, motivation, and self-discipline. If time is a constraint and one
                                                needs professional guidance to ensure a competitive edge in GMAT exam
                                                preparation, then join a&nbsp;<a
                                                    href="https://overseaseducationlane.com/how-to-select-the-best-coaching-center-for-gmat-prep-articlepage-458"
                                                    target="_blank">coaching center for&nbsp;GMAT</a>&nbsp;is the better
                                                option.</p>
                                            <h4>GMAT Study Material</h4>
                                            <p>If you take the route of self-study to prepare for GMAT, there are a lot
                                                of&nbsp;<a
                                                    href="https://overseaseducationlane.com/exams/gmat/selected-books-and-resources-for-gmat-exam-preparation"
                                                    target="_blank">books and resources</a>&nbsp;along with study materials
                                                and GMAT study plans available to help you. GMAC has its own official study
                                                guide and free software. Refer to the following GMAT guides and books to
                                                help create a study plan -</p>
                                            <ul>
                                                <li dir="ltr"><a
                                                        href="http://www.mba.com/india/store/store-catalog/gmat-preparation/the-official-guide-for-gmat-review-2015.aspx?CID=5F303BC4-9BE7-4E74-B516-DB456903CDFD"
                                                        target="_blank" rel="nofollow">The Official Guide for GMAT Review,
                                                        2021</a>&nbsp;– This exam guide includes more than 900 questions
                                                    from past GMAT exams, a diagnostic section to help you assess where to
                                                    focus your efforts, and invaluable test-taking tips and strategies to
                                                    help you get the score you want.&nbsp;</li>
                                                <li dir="ltr"><a
                                                        href="http://www.mba.com/india/the-gmat-exam/prepare-for-the-gmat-exam/test-prep-materials/free-gmat-prep-software.aspx"
                                                        target="_blank" rel="nofollow">Free GMATPrep Software</a>&nbsp;–
                                                    this software includes ninety free questions – 30 Quantitative, 45
                                                    Verbal, and 15 Integrated Reasoning – with answers and explanations,
                                                    tools to create your own practice question set, two full-length practice
                                                    tests with answers, etc.</li>
                                                <li dir="ltr"><a
                                                        href="https://www.manhattanprep.com/gmat/store/item/gmat-complete-prep-set/"
                                                        target="_blank" rel="nofollow">Manhattan GMAT Strategy
                                                        Guides</a>&nbsp;- This set includes: GMAT Roadmap; Fractions,
                                                    Decimals, &amp; Percents; Algebra; Word Problems; Geometry; Number
                                                    Properties; Critical Reasoning; Reading Comprehension; Sentence
                                                    Correction; Integrated Reasoning &amp; Essay.</li>
                                                <li dir="ltr"><a
                                                        href="http://www.amazon.in/Kaplan-GMAT-800-Advanced-Students/dp/1419553429"
                                                        target="_blank" rel="nofollow">Kaplan GMAT 800: Advanced Prep for
                                                        Advanced Students</a>&nbsp;- Tips for test-taking, proven strategies
                                                    for getting a perfect score of 800, and focused guidelines for tackling
                                                    each question type all combine for the ideal preparation tool for the
                                                    most ambitious student.</li>
                                            </ul>
                                        </div>


                                    </div>
                                </div>


                                <div class="tab-pane fade" id="practice-test" role="tabpanel"
                                    aria-labelledby="prod-reviews-tab">
                                    <div class="content pt-30 pb-30 pl-30 pr-30 white-bg pb-30 pl-30 pr-30 white-bg">
                                        <div>
                                            <p>The Graduate Management Admission Test (GMAT) is taken by students who wish
                                                to enroll in a finance-related course or want to pursue an MBA. The test is
                                                conducted for admissions into different management programs across the
                                                globe. The candidates are tested in verbal, quantitative, writing,
                                                analytical, and reading skills in the English language.</p>
                                            <p><strong>Sample Papers</strong></p>
                                            <p>Preparation for the <a href="https://overseaseducationlane.com/exams/gmat"
                                                    target="_blank">GMAT exam</a>&nbsp;is not easy, the aspirants need to
                                                be focused, hardworking, and should follow a concrete study plan to get the
                                                score they want. One can register on the official website of the GMAT and
                                                create a free account to <a
                                                    href="https://www.mba.com/india/store/download-free-gmatprep-software.aspx"
                                                    target="_blank" rel="nofollow">download free GMAT prep software
                                                    here</a>.</p>
                                            <p>Those who are planning to prepare for self-study can follow the <a
                                                    href="https://www.mba.com/exams/gmat/before-the-exam/perform-your-best-on-test-day/gmat-exam-8-week-study-plan"
                                                    target="_blank" rel="nofollow">8-week study plan</a> provided by the
                                                GMAC, the official body that conducts the GMAT exam. This plan provides a
                                                detailed approach for preparing for the exam. It includes tips that help in
                                                enhancing the strengths of the candidate and advice which focuses to improve
                                                the weak area of the candidates.</p>
                                            <p>&nbsp;<strong>GMAT Sample Questions</strong></p>
                                            <table class="table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <p><a href="https://overseaseducationlane.com/exams/gmat/quantitative-section-sample-questions"
                                                                    target="_blank">Quantitative Section</a></p>
                                                        </td>
                                                        <td>
                                                            <p><a href="https://overseaseducationlane.com/exams/gmat/integrated-reasoning-sample-questions"
                                                                    target="_blank">Integrated Reasoning Section</a></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <p><a href="https://overseaseducationlane.com/exams/gmat/verbal-sample-questions"
                                                                    target="_blank">Verbal Skills Section</a></p>
                                                        </td>
                                                        <td>
                                                            <p><a href="https://overseaseducationlane.com/exams/gmat/analytical-writing-sample-questions"
                                                                    target="_blank">Analytical Writing Section</a></p>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <p>Apart from this, candidates can also take various other tools that can help
                                                them in preparing for this competitive exam. Candidates can take <a
                                                    href="https://www.mba.com/india/store/store-catalog/gmat-preparation/ir-prep-tool.aspx"
                                                    target="_blank" rel="nofollow">IR Prep Tool</a> which allows the user
                                                to practice anytime, anywhere. This Integrated Reasoning prep tool comprises
                                                of never-before-seen questions that are given directly by the makers of the
                                                GMAT. Through this tool, the aspirants can evaluate their progress through
                                                time management and by tracking their session's progress.</p>
                                            <p>Also, the candidates can start their preparation with <a
                                                    href="https://www.mba.com/india/store/store-catalog/gmat-preparation/premium-gmat-study-collection-2018.aspx"
                                                    target="_blank" rel="nofollow">The Premium GMAT Study Collection</a>.
                                                It includes six study products:</p>
                                            <ul>
                                                <li>GMAT Official Guide 2021</li>
                                                <li>GMAT Official Guide Verbal Review 2021</li>
                                                <li>GMAT Official Guide Quantitative Review 2021</li>
                                                <li>GMAT Prep Exam Pack 1</li>
                                                <li>GMAT Prep Exam Pack 2</li>
                                                <li>GMAT Prep Question Pack 1</li>
                                                <li>GMAT Paper Tests Set I, II, and III</li>
                                                <li>GMAT Focus Online Quantitative Diagnostic Tool, set of 3</li>
                                                <li>IR Prep Tool</li>
                                            </ul>
                                            <p>This complete collection comprises of books and digital products.</p>
                                            <h4>GMAT Tutorials</h4>
                                            <p>Students can check out section-wise GMAT tutorials:</p>
                                            <ul>
                                                <li><a href="http://bit.ly/2wuVCj1" target="_blank" rel="nofollow">GMAT
                                                        Math Practice Questions</a>&nbsp;</li>
                                                <li><a href="http://bit.ly/2wbAf6N" target="_blank">Integrated Reasoning
                                                        Speed Strategy</a>&nbsp;</li>
                                                <li><a href="http://bit.ly/2MLboAb" target="_blank">Verbal Strategies
                                                        Study Guide</a></li>
                                            </ul>
                                            <p></p>
                                        </div>

                                    </div>
                                </div>


                                <div class="tab-pane fade" id="score" role="tabpanel"
                                    aria-labelledby="prod-reviews-tab">
                                    <div class="content pt-30 pb-30 pl-30 pr-30 white-bg pb-30 pl-30 pr-30 white-bg">
                                        <div>
                                            <p dir="ltr">After you take the <a
                                                    href="https://overseaseducationlane.com/exams/gmat"
                                                    target="_blank">GMAT 2021 exam</a>, you will receive five scores:&nbsp;
                                                Analytical Writing Assessment, Integrated Reasoning, Quantitative, Verbal,
                                                and Total. Your total GMAT score is based on your Verbal and Quantitative
                                                scores. Your Analytical Writing Assessment and Integrated Reasoning scores
                                                do not affect the GMAT total score. You also get a percentile score, which
                                                tells you how you have scored comparatively to every 100 candidates taking
                                                the GMAT. For example, if your score in the Verbal section is 90 percentile,
                                                it means that for every 100 candidates attempting the GMAT 2021, you are
                                                ahead of 90 candidates.</p>
                                            <p>Here is a comparative table of your scaled score to percentile:</p>
                                            <div dir="ltr">
                                                <table class="table-bordered">
                                                    <colgroup>
                                                        <col width="194">
                                                        <col width="162">
                                                        <col width="194">
                                                        <col width="162">
                                                    </colgroup>
                                                    <tbody>
                                                        <tr>
                                                            <th>
                                                                <h4>Scaled Score</h4>
                                                            </th>
                                                            <th>
                                                                <h4>Percentile</h4>
                                                            </th>
                                                            <th>
                                                                <h4>Scaled Score</h4>
                                                            </th>
                                                            <th>
                                                                <h4>Percentile</h4>
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <p dir="ltr">760-800</p>
                                                            </td>
                                                            <td>
                                                                <p dir="ltr">99</p>
                                                            </td>
                                                            <td>
                                                                <p dir="ltr">520</p>
                                                            </td>
                                                            <td>
                                                                <p dir="ltr">37</p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <p dir="ltr">750</p>
                                                            </td>
                                                            <td>
                                                                <p dir="ltr">98</p>
                                                            </td>
                                                            <td>
                                                                <p dir="ltr">510</p>
                                                            </td>
                                                            <td>
                                                                <p dir="ltr">35</p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <p dir="ltr">740</p>
                                                            </td>
                                                            <td>
                                                                <p dir="ltr">97</p>
                                                            </td>
                                                            <td>
                                                                <p dir="ltr">500</p>
                                                            </td>
                                                            <td>
                                                                <p dir="ltr">32</p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <p dir="ltr">730</p>
                                                            </td>
                                                            <td>
                                                                <p dir="ltr">96</p>
                                                            </td>
                                                            <td>
                                                                <p dir="ltr">490</p>
                                                            </td>
                                                            <td>
                                                                <p dir="ltr">30</p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <p dir="ltr">720</p>
                                                            </td>
                                                            <td>
                                                                <p dir="ltr">94</p>
                                                            </td>
                                                            <td>
                                                                <p dir="ltr">480</p>
                                                            </td>
                                                            <td>
                                                                <p dir="ltr">27</p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <p dir="ltr">710</p>
                                                            </td>
                                                            <td>
                                                                <p dir="ltr">92</p>
                                                            </td>
                                                            <td>
                                                                <p dir="ltr">470</p>
                                                            </td>
                                                            <td>
                                                                <p dir="ltr">25</p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <p dir="ltr">700</p>
                                                            </td>
                                                            <td>
                                                                <p dir="ltr">89</p>
                                                            </td>
                                                            <td>
                                                                <p dir="ltr">460</p>
                                                            </td>
                                                            <td>
                                                                <p dir="ltr">22</p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <p dir="ltr">690</p>
                                                            </td>
                                                            <td>
                                                                <p dir="ltr">87</p>
                                                            </td>
                                                            <td>
                                                                <p dir="ltr">450</p>
                                                            </td>
                                                            <td>
                                                                <p dir="ltr">20</p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <p dir="ltr">680</p>
                                                            </td>
                                                            <td>
                                                                <p dir="ltr">85</p>
                                                            </td>
                                                            <td>
                                                                <p dir="ltr">440</p>
                                                            </td>
                                                            <td>
                                                                <p dir="ltr">18</p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <p dir="ltr">670</p>
                                                            </td>
                                                            <td>
                                                                <p dir="ltr">83</p>
                                                            </td>
                                                            <td>
                                                                <p dir="ltr">430</p>
                                                            </td>
                                                            <td>
                                                                <p dir="ltr">17</p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <p dir="ltr">660</p>
                                                            </td>
                                                            <td>
                                                                <p dir="ltr">80</p>
                                                            </td>
                                                            <td>
                                                                <p dir="ltr">420</p>
                                                            </td>
                                                            <td>
                                                                <p dir="ltr">15</p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <p dir="ltr">650</p>
                                                            </td>
                                                            <td>
                                                                <p dir="ltr">77</p>
                                                            </td>
                                                            <td>
                                                                <p dir="ltr">410</p>
                                                            </td>
                                                            <td>
                                                                <p dir="ltr">14</p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <p dir="ltr">640</p>
                                                            </td>
                                                            <td>
                                                                <p dir="ltr">73</p>
                                                            </td>
                                                            <td>
                                                                <p dir="ltr">400</p>
                                                            </td>
                                                            <td>
                                                                <p dir="ltr">12</p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <p dir="ltr">630</p>
                                                            </td>
                                                            <td>
                                                                <p dir="ltr">71</p>
                                                            </td>
                                                            <td>
                                                                <p dir="ltr">390</p>
                                                            </td>
                                                            <td>
                                                                <p dir="ltr">11</p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <p dir="ltr">620</p>
                                                            </td>
                                                            <td>
                                                                <p dir="ltr">68</p>
                                                            </td>
                                                            <td>
                                                                <p dir="ltr">380</p>
                                                            </td>
                                                            <td>
                                                                <p dir="ltr">10</p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <p dir="ltr">610</p>
                                                            </td>
                                                            <td>
                                                                <p dir="ltr">65</p>
                                                            </td>
                                                            <td>
                                                                <p dir="ltr">370</p>
                                                            </td>
                                                            <td>
                                                                <p dir="ltr">9</p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <p dir="ltr">600</p>
                                                            </td>
                                                            <td>
                                                                <p dir="ltr">62</p>
                                                            </td>
                                                            <td>
                                                                <p dir="ltr">360</p>
                                                            </td>
                                                            <td>
                                                                <p dir="ltr">8</p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <p dir="ltr">590</p>
                                                            </td>
                                                            <td>
                                                                <p dir="ltr">58</p>
                                                            </td>
                                                            <td>
                                                                <p dir="ltr">340-350</p>
                                                            </td>
                                                            <td>
                                                                <p dir="ltr">6</p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <p dir="ltr">580</p>
                                                            </td>
                                                            <td>
                                                                <p dir="ltr">55</p>
                                                            </td>
                                                            <td>
                                                                <p dir="ltr">330</p>
                                                            </td>
                                                            <td>
                                                                <p dir="ltr">5</p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <p dir="ltr">570</p>
                                                            </td>
                                                            <td>
                                                                <p dir="ltr">52</p>
                                                            </td>
                                                            <td>
                                                                <p dir="ltr">310-320</p>
                                                            </td>
                                                            <td>
                                                                <p dir="ltr">4</p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <p dir="ltr">560</p>
                                                            </td>
                                                            <td>
                                                                <p dir="ltr">49</p>
                                                            </td>
                                                            <td>
                                                                <p dir="ltr">280-300</p>
                                                            </td>
                                                            <td>
                                                                <p dir="ltr">3</p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <p dir="ltr">550</p>
                                                            </td>
                                                            <td>
                                                                <p dir="ltr">46</p>
                                                            </td>
                                                            <td>
                                                                <p dir="ltr">250-270</p>
                                                            </td>
                                                            <td>
                                                                <p dir="ltr">2</p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <p dir="ltr">540</p>
                                                            </td>
                                                            <td>
                                                                <p dir="ltr">43</p>
                                                            </td>
                                                            <td>
                                                                <p dir="ltr">220-240</p>
                                                            </td>
                                                            <td>
                                                                <p dir="ltr">1</p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <p dir="ltr">530</p>
                                                            </td>
                                                            <td>
                                                                <p dir="ltr">39</p>
                                                            </td>
                                                            <td>
                                                                <p dir="ltr">200-210</p>
                                                            </td>
                                                            <td>
                                                                <p dir="ltr">0</p>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Video Column -->
                    <div class="video-column col-lg-4">
                        <div class="inner-column">
                            <div class="widget-archives">
                                <div class="widget-archives mb-50">
                                    <h3 class="widget-title">Other Exams</h3>

                                    <ul>
                                        <li><a href="{{ url('ielts') }}">IELTS</a></li>
                                        <li><a href="{{ url('act') }}">ACT</a></li>
                                        <li><a href="{{ url('pet') }}">PET</a></li>
                                        <li><a href="{{ url('gmat') }}">GMAT</a></li>
                                        <li><a href="{{ url('gre') }}">GRE</a></li>
                                        <li><a href="{{ url('toefl') }}">TOEFL</a></li>
                                        <li><a href="{{ url('sat') }}">SAT</a></li>
                                        <li><a href="{{ url('tem') }}">TEM </a></li>
                                    </ul>
                                </div>
                            </div>


                            <div class="recent-posts-widget mb-50">
                                <h3 class="widget-title mb-30">Read more about - How to prepare for the IELTS</h3>
                                <div class="show-featured ">
                                    <div class="post-img">
                                        <a href="#"><img src="{{ asset('public/home/images/blog/1.jpg') }}"
                                                alt=""></a>
                                    </div>
                                    <div class="post-desc">
                                        <a href="#">Tips and Tricks to Get a Perfect Score on the IELTS like
                                            Manny</a>

                                    </div>
                                </div>
                                <div class="show-featured ">
                                    <div class="post-img">
                                        <a href="#"><img src="{{ asset('public/home/images/blog/2.jpg') }}"
                                                alt=""></a>
                                    </div>
                                    <div class="post-desc">
                                        <a href="#">Test yourself: How good is your English to study abroad?</a>

                                    </div>
                                </div>
                                <div class="show-featured ">
                                    <div class="post-img">
                                        <a href="#"><img src="{{ asset('public/home/images/blog/3.jpg') }}"
                                                alt=""></a>
                                    </div>
                                    <div class="post-desc">
                                        <a href="#">Blunders to avoid when attempting the IELTS</a>

                                    </div>
                                </div>
                                <div class="show-featured ">
                                    <div class="post-img">
                                        <a href="#"><img src="{{ asset('public/home/images/blog/4.jpg') }}"
                                                alt=""></a>
                                    </div>
                                    <div class="post-desc">
                                        <a href="#">Is IELTS Mandatory to Study Abroad?</a>

                                    </div>
                                </div>
                                <div class="show-featured ">
                                    <div class="post-img">
                                        <a href="#"><img src="{{ asset('public/home/images/blog/5.jpg') }}"
                                                alt=""></a>
                                    </div>
                                    <div class="post-desc">
                                        <a href="#">What is TOEFL and how does it differ from IELTS?</a>

                                    </div>
                                </div>
                            </div>

                            <!-- Video Box -->
                            <div class="intro-video media-icon orange-color2">
                                <img class="video-img" src="{{ asset('public/home/images/about-video-bg2.png') }}"
                                    alt="Video Image">
                                <a class="popup-videos" href="https://www.youtube.com/watch?v=atMUy_bPoQI">
                                    <i class="fa fa-play"></i>
                                </a>
                                <hr>
                                <h4>Preview this course</h4>
                                <hr><a href="#" class="btn readon2">Download Guide</a>
                            </div>
                            <!-- End Video Box -->






                        </div>
                    </div>





                </div>
            </div>
        </div>
        <!-- About Section End -->

    </div>


    <!-- body content end here -->



   

@endsection
