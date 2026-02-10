 <?php

    use App\Http\Controllers\{
        CmsController,
        ProfileController,
        UserController,
        RolesController,
        DashboardController,
        FrenchiseController,
        FrontendController,
        LeadsManageCotroller,
        MessageController,
        OtherMasterDataController,
        ProgramController,
        StudentController,
        UniversityController,
        LearningTrainingController,
        AccountingController,
        DataOperatorController
    };
    use Illuminate\Support\Facades\Route;
    use Maatwebsite\Excel\Row;
    use App\Http\Controllers\ReportController;
    use App\Http\Controllers\FacebookLeadController;
    // URL::forceScheme('https');

    use Illuminate\Support\Facades\Artisan;

    Route::get('/clear-all', function () {
        Artisan::call('config:clear');
        Artisan::call('cache:clear');



        return "All cache cleared!";
    });

    Route::fallback(function () {
        return view('errors.404');
    });
    Route::get('meetoel', function () {
        return view('frontend.global.meetoel');
    });
    Route::get('psychometricstest', function () {
        return view('frontend.global.psychometricstest');
    });
    Route::get('countryprogram', function () {
        return view('frontend.global.countryprogram');
    });
    Route::get('admissionguidance', function () {
        return view('frontend.global.admissionguidance');
    });
    Route::get('testprepration', function () {
        return view('frontend.global.testprepration');
    });
    Route::get('pretestprepration', function () {
        return view('frontend.global.pretestprepration');
    });
    Route::get('resumeevaluation', function () {
        return view('frontend.global.resumeevaluation');
    });
    Route::get('universityapplicationassistance', function () {
        return view('frontend.global.universityapplicationassistance');
    });
    Route::get('financialcounselling', function () {
        return view('frontend.global.financialcounselling');
    });
    Route::get('visainterview', function () {
        return view('frontend.global.visainterview');
    });
    Route::get('foreignexchange', function () {
        return view('frontend.global.foreignexchange');
    });
    Route::get('predeparturebriefing', function () {
        return view('frontend.global.predeparturebriefing');
    });
    Route::get('bonvoyage', function () {
        $data['bonvoyage'] = "bonvoyage";
        return view('frontend.global.bonvoyage', $data);
    });
    Route::get('travelmedical', function () {
        return view('frontend.global.travelmedical');
    });
    Route::get('accommodation', function () {
        return view('frontend.global.acommodation');
    });
    Route::get('/send-daily-report', [ReportController::class, 'sendDailyUserReport']);

    Route::get('roseday', [FrontendController::class, 'index'])->name('index');
    Route::post('/query_submit', [FrontendController::class, 'user_query'])->name('query');
    Route::get('/apply-program', [FrontendController::class, 'course_university'])->name('check-eligible');
    Route::post('/get-country-flags', [FrontendController::class, 'get_country'])->name('get-country-flags');
    Route::post('/get-item-details', [FrontendController::class, 'get_country'])->name('get-item-details');
    Route::post('get-program-sublevel', [ProgramController::class, 'get_program_sublevel'])->name('get-program-sublevel');
    Route::post('get-education-level-data', [ProgramController::class, 'get_education_level'])->name('get-education-level-data');
    Route::post('program-subdiscipline-data', [ProgramController::class, 'program_subdiscipline_data'])->name('program-subdiscipline-data');
    Route::post('fetch-other-exam-data', [ProgramController::class, 'other_exam'])->name('fetch-other-exam-data');
    Route::get('course-finder', [FrontendController::class, 'course_university'])->name('course-finder');
    Route::get('fetch-university-course', [FrontendController::class, 'course_university'])->name('fetch-university-course');
    Route::post('get-education-level-filter', [FrontendController::class, 'education_level_filter'])->name('get-education-level-filter');
    Route::post('get-university-course', [FrontendController::class, 'get_university_course'])->name('get-university-course');
    Route::get('course-details/{id?}', [FrontendController::class, 'course_details'])->name('course-details');
    Route::get('view-program-data/{id?}', [FrontendController::class, 'view_program_data'])->name('view-program-data');
    Route::get('selected-program-data', [FrontendController::class, 'view_program_data'])->name('view-program-data');
    Route::get('apply-program-payment/{student_id}/{program_id}', [FrontendController::class, 'apply_program_payment'])->name('apply-program-payment');
    Route::get('pay-later/{student_id}/{program_id}/{amount?}/{intake_month?}/{intake_year?}', [FrontendController::class, 'pay_later'])->name('pay-later');
    Route::get('check-eligibility', [FrontendController::class, 'check_eligibility'])->name('check-eligibility');
    Route::get('universities/{page?}', [FrontendController::class, 'universities'])->name('universities');
    Route::get("university-details/{id}", [UniversityController::class, 'view_university'])->name('view-university');
    Route::get('continue-course/{student_id}/{program_id}/{amount?}/{intake_month?}/{intake_year?}', [FrontendController::class, 'continue_course'])->name('continue-course');
    Route::get('programs/{page?}', [FrontendController::class, 'programs'])->name('programs');
    Route::get('about-oel', [FrontendController::class, 'about_oel'])->name('about-oel');
    Route::get('contact-us', [FrontendController::class, 'contact_us'])->name('contact_us');
    Route::post('contact-us', [FrontendController::class, 'storeContactus'])->name('contact_us.store');
    Route::get('all-blogs', [FrontendController::class, 'blogs'])->name('all-blogs');
    Route::get('blog-details/{title}', [FrontendController::class, 'blog_details'])->name('blog-details');
    Route::get('testimonials', [FrontendController::class, 'testimonials'])->name('testimonials');
    Route::get('frequently-asked-questions', [FrontendController::class, 'frequently_asked_questions'])->name('frequently-asked-questions');
    Route::get('privacy-policy', [FrontendController::class, 'privacy_policy'])->name('privacy-policy');
    Route::get('terms-and-conditions', [FrontendController::class, 'termscondition'])->name('terms-and-conditions');
    Route::get('program-offered', [FrontendController::class, 'program_offered'])->name('program-offered');
    Route::get('programs-offered', [FrontendController::class, 'programs_offered_filter'])->name('programs-offered');
    Route::get("service-details/{id}", [FrontendController::class, 'service_details'])->name('service-details');

    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->middleware(['auth', 'verified'])->name('dashboard');
    // Route::get('/impersonate/{user}', 'UserController@impersonate')->name('impersonate')->middleware('can:impersonate-users');
    // Route::get('/impersonate/{user}', [UserController::class, 'impersonate'])->name('impersonate')->middleware('auth', 'role:Administrator');
    // Route::get('/revert-to-admin', [UserController::class, 'revertToAdmin'])->name('revert_to_admin')->middleware('auth');
    Route::get('pay-now/{token?}', [LeadsManageCotroller::class, 'payment_view']);
    Route::post('payment/create', [LeadsManageCotroller::class, 'store'])->name('razorpay.payment.store');
    Route::post('payment/failure', [LeadsManageCotroller::class, 'failure'])->name('razorpay.payment.failure');
    Route::get('payment/success', [LeadsManageCotroller::class, 'success'])->name('razorpay.payment.succes');

    Route::post('send-payment-link', [StudentController::class, 'payment_link'])->name('send-payment-link');
    Route::get('payment_link_details', [StudentController::class, 'payment_link_details'])->name('fetch-student-payment');
    Route::get('delete-payment-link', [StudentController::class, 'delete_payment_link'])->name('delete-payment-link');

    Route::get('/get-program', [StudentController::class, 'get_program'])->name('get-program');

    // student mobile number verfication
    Route::post('/send-otp', [FrontendController::class, 'send_otp'])->name('send-otp');
    Route::post('/verify-otp', [FrontendController::class, 'verify_otp'])->name('verify-otp');


    Route::get('pay-amount/{student_id?}/{program_id?}/{amount?}/{intake_month?}/{intake_year?}', [FrontendController::class, 'pay_amount'])->name('pay-amount');

    Route::middleware('auth')->group(function () {
        // Route::get('/', [DashboardController::class, 'index']);
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::get('dashborad-data/{key}', [DashboardController::class, 'dashboard_data'])->name('dashboard-data');

        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        Route::prefix('admin-management')->group(function () {
            Route::get('/revert-to-admin', [UserController::class, 'revertToAdmin'])->name('revert_to_admin');
            Route::get('/impersonate/{user}', [UserController::class, 'impersonate'])->name('impersonate');
            // Route::get('/users', [UserController::class, 'index'])->name('users.index');
            Route::match(['get', 'post'], 'users/{action?}', [UserController::class, 'index'])->name('users.index');
            Route::get('/create-user', [UserController::class, 'create'])->name('users.create');
            Route::post('/store', [UserController::class, 'store'])->name('users.store');
            Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
            Route::post('/users/update/{id}', [UserController::class, 'update'])->name('users.update');
            Route::get('/users/delete/{id}', [UserController::class, 'destroy'])->name('users.destroy');

            Route::get('/roles-permissions', [RolesController::class, 'index'])->name('roles-permissions.index');
            Route::get('/roles-permissions/create', [RolesController::class, 'create'])->name('roles-permissions.create');
            Route::post('/roles-permissions/store', [RolesController::class, 'store'])->name('roles-permissions.store');
            Route::get('/roles-permissions/edit/{id}', [RolesController::class, 'edit'])->name('roles-permissions.edit');
            Route::post('/roles-permissions/update/{id}', [RolesController::class, 'update'])->name('roles-permissions.update');
            Route::get('/roles-permissions/delete/{id}', [RolesController::class, 'destroy'])->name('roles-permissions.delete');
        });
        Route::prefix('admin')->group(function () {
            Route::get('leads-dashboard', [LeadsManageCotroller::class, 'leadsDashboard']);
            Route::get('add-leads', [LeadsManageCotroller::class, 'create_new_lead'])->name('admin.create_new_lead');
            Route::post('add-leadData-tab', [LeadsManageCotroller::class, 'add_lead_data'])->name('add-leadData-tab');
            Route::match(['get', 'post'], 'leads-lists/{action?}', [LeadsManageCotroller::class, 'lead_list'])->name('leads-filter');
            Route::get('assigned-lead', [LeadsManageCotroller::class, 'assigned_leads'])->name('assigned-leads');
            Route::get('assigned-leads-filter', [LeadsManageCotroller::class, 'assigned_leads'])->name('assigned-leads-filter');
            Route::get('missed-leads', [LeadsManageCotroller::class, 'missed_leads_data'])->name('missed-leads');

            Route::get('pending-lead', [LeadsManageCotroller::class, 'pending_leads'])->name('pending-leads');
            Route::get('pending-leads-filter', [LeadsManageCotroller::class, 'pending_leads'])->name('pending-leads-filter');
            Route::get('/total-applied-program', [ProgramController::class, 'total_applied_program'])->name('total-applied-program');

            Route::any('excel-sheet-export', [LeadsManageCotroller::class, 'lead_list_export'])->name('lead_list_export');
            Route::get('manage-lead/{id?}', [LeadsManageCotroller::class, 'manage_lead'])->name('manage-lead');
            Route::get('lead-quality/{id?}', [LeadsManageCotroller::class, 'lead_quality'])->name('lead-quality');
            Route::post('lead-quality-store/{id?}', [LeadsManageCotroller::class, 'lead_quality_store'])->name('lead-quality-store');
            Route::get('/lead-quality-count/{id?}', [LeadsManageCotroller::class, 'countSelections'])->name('lead-quality-count');

            Route::get('edit-lead/{id?}', [LeadsManageCotroller::class, 'edit_lead_data'])->name('edit-lead');
            Route::get('delete-user-follow-up/{id?}', [LeadsManageCotroller::class, 'delete_user_follow_up'])->name('delete-user-follow-up');

            Route::get('show-lead/{id?}', [LeadsManageCotroller::class, 'show_lead'])->name('view-lead');
            Route::get('create_student_profile/{id}', [LeadsManageCotroller::class, 'create_student_profile'])->name('create-student-profile');
            Route::get('oel-360/', [LeadsManageCotroller::class, 'oel_360'])->name('oel_360');
            Route::get('lead-details', [LeadsManageCotroller::class, 'lead_details'])->name('lead-details');
            Route::get('apply-360/{id?}', [LeadsManageCotroller::class, 'aply_360'])->name('apply-360');
            Route::get('/getCourses', [LeadsManageCotroller::class, 'getCourses'])->name('getCourses');

            Route::get('fetch-visa-sub-document/{visa_document_id?}', [LeadsManageCotroller::class, 'fetch_visa_sub_document'])->name('fetch-visa-sub-document');
            Route::get('get-lead-360-images', [LeadsManageCotroller::class, 'get_lead_360_images'])->name('get-lead-360-images');
            Route::get('delete-lead-360-image', [LeadsManageCotroller::class, 'delete_lead_360_image'])->name('delete-lead-360-image');
            Route::get('apply-oel-360', [LeadsManageCotroller::class, 'aply_360'])->name('apply-oel-360');
            Route::post('aply-lead-360/', [LeadsManageCotroller::class, 'store_lead_360'])->name('store-lead-360');
            Route::get('leads/{key}', [LeadsManageCotroller::class, 'fetch_leads'])->name('fetch-leads');
            Route::get('bulk-upload/', [LeadsManageCotroller::class, 'bulk_upload'])->name('bulk-upload');
            Route::post('excel-sheet-uplod-lead', [LeadsManageCotroller::class, 'excel_sheet_leads'])->name('excel-sheet-leads');
            Route::Post('add-user-follow-up', [LeadsManageCotroller::class, 'add_user_follow_up'])->name('add-user-follow-up');
            Route::get('fetch-follow-up-date', [LeadsManageCotroller::class, 'follow_up_list'])->name('follow-up-list');
            Route::post("update-user-status", [UserController::class, 'updateUserStatus'])->name('statusUpdateUser');
            Route::post("approve-user-status", [UserController::class, 'approveUserStatus'])->name('approveStatusUpdate');
            Route::get("relocate-frenchise", [LeadsManageCotroller::class, 'relocated_frenchise'])->name('relocated-frenchise');
            Route::post('assign-leads', [LeadsManageCotroller::class, 'allocate_franchise'])->name('assign-leads');
            // Route::post('assign-leads',[LeadsManageCotroller::class,'allocate_franchise']);
            Route::get("student-list", [StudentController::class, 'student_list'])->name('student-list');
            // Route::get('cehckout/{say}',[LeadsManageCotroller::class,'with_parameter'])->name('parameter');
            Route::get('get-visa-document', [LeadsManageCotroller::class, 'get_visa_document'])->name('get-visa-document');
            Route::get('delete-visa-document-three', [LeadsManageCotroller::class, 'delete_visa_document'])->name('delete-visa-document-three');
            Route::post('university-course', [LeadsManageCotroller::class, 'university_course'])->name('university.courses');
            // student registration fees
            Route::get('student-registration-fees', [StudentController::class, 'student_registration_fees'])->name('student-registration-fees');
            Route::get('student-registration-fees-filter', [StudentController::class, 'student_registration_fees'])->name('student-registration-fees-filter');
            Route::get('create-student-registration-fees', [StudentController::class, 'student_registration_fees_create'])->name('create-student-registration-fees');
            Route::post('store-student-registration-fees', [StudentController::class, 'student_registration_fees_store'])->name('store-student-registration-fees');
            Route::get('edit-student-registration-fees/{id?}', [StudentController::class, 'student_registration_fees_edit'])->name('edit-student-registration-fees');
            Route::post('update-student-registration-fees/{id?}', [StudentController::class, 'student_registration_fees_update'])->name('update-student-registration-fees');
            Route::get('delete-student-registration-fees/{id?}', [StudentController::class, 'student_registration_fees_destroy'])->name('delete-student-registration-fees');
            Route::get('delete-program/{id}', [StudentController::class, 'delete_program'])->name('delete-program');

            Route::get('student-apply-question', [StudentController::class, 'student_question'])->name('student-question');
            Route::get('student-question-filter', [StudentController::class, 'student_question'])->name('student-question-filter');
            Route::get('create-student-question', [StudentController::class, 'student_question_create'])->name('create-student-question');
            Route::post('store-student-question', [StudentController::class, 'student_question_store'])->name('store-student-question');
            Route::get('edit-student-question/{id?}', [StudentController::class, 'student_question_edit'])->name('edit-student-question');
            Route::post('update-student-question/{id?}', [StudentController::class, 'student_question_update'])->name('update-student-question');
            Route::get('delete-student-question/{id?}', [StudentController::class, 'student_question_destroy'])->name('delete-student-question');

            // Student assistance
            Route::get('student-assistance', [StudentController::class, 'student_assistance'])->name('student-assistance');
            Route::get('student-assistance-filter', [StudentController::class, 'student_assistance'])->name('student-assistance-filter');
            Route::get('create-student-assistance', [StudentController::class, 'student_assistance_create'])->name('create-student-assistance');
            Route::post('store-student-assistance', [StudentController::class, 'student_assistance_store'])->name('store-student-assistance');
            Route::get('edit-student-assistance/{id?}', [StudentController::class, 'student_assistance_edit'])->name('edit-student-assistance');
            Route::post('update-student-assistance/{id?}', [StudentController::class, 'student_assistance_update'])->name('update-student-assistance');
            Route::get('delete-student-assistance/{id?}', [StudentController::class, 'student_assistance_destroy'])->name('delete-student-assistance');

            // Student guide
            Route::get('popular-student-guide', [StudentController::class, 'student_guide'])->name('student-guide');
            Route::get('student-guide-filter', [StudentController::class, 'student_guide'])->name('student-guide-filter');
            Route::get('create-student-guide', [StudentController::class, 'student_guide_create'])->name('create-student-guide');
            Route::post('store-student-guide', [StudentController::class, 'student_guide_store'])->name('store-student-guide');
            Route::get('edit-student-guide/{id?}', [StudentController::class, 'student_guide_edit'])->name('edit-student-guide');
            Route::post('update-student-guide/{id?}', [StudentController::class, 'student_guide_update'])->name('update-student-guide');
            Route::get('delete-student-guide/{id?}', [StudentController::class, 'student_guide_destroy'])->name('delete-student-guide');
            Route::get('get-school-attendaned', [StudentController::class, 'get_school_attendend'])->name('get-school-attendaned');
            Route::post('check-student-attendend', [StudentController::class, 'check_school_attendend_store'])->name('check-student-attendend');

            // university
            Route::get("manage-university", [UniversityController::class, 'manage_university'])->name('manage-university');
            Route::get("filter-university", [UniversityController::class, 'manage_university'])->name('filter-university');
            Route::post('/university-gallery-delete', [UniversityController::class, 'deleteGalleryImage'])->name('university-gallery-delete');



            Route::get('add-university', [UniversityController::class, 'create_university'])->name('add-university');
            Route::post('store-university', [UniversityController::class, 'store_university'])->name('store-university');
            Route::post('add-uni-ranking/{id?}', [UniversityController::class, 'add_uni_ranking'])->name('add-university-rank');
            Route::get('all_uni_rank/{id?}', [UniversityController::class, 'all_uni_ranking'])->name('all-uni-ranking');
            Route::get('delete-uni-ranking/{id?}', [UniversityController::class, 'delete_uni_ranking']);

            Route::post('add-uni-accerediation/{id?}', [UniversityController::class, 'add_uni_accerediation'])->name('add-uni-accerediation');
            Route::get('all-uni-accerediation/{id?}', [UniversityController::class, 'all_uni_accerediation'])->name('all-uni-accerediation');
            Route::get('delete-uni-accerediation/{id?}', [UniversityController::class, 'delete_uni_accerediation']);

            // University document
            Route::post('add-uni-documents/{id?}', [UniversityController::class, 'add_uni_documents'])->name('add-uni-documents');
            Route::get('university-document/{id?}', [UniversityController::class, 'university_document'])->name('university-document');

            Route::get('edit-university/{id?}', [UniversityController::class, 'edit_university'])->name('edit-university');
            Route::get('delete-university/{id?}', [UniversityController::class, 'delete_university'])->name('delete-university');
            Route::post("approve-university", [UniversityController::class, 'approve_university'])->name('approve-university');

            Route::get("approved-university", [UniversityController::class, 'view_approve_university'])->name('view-approved-university');
            // Route::get("filter-approved-university",[UniversityController::class,'view_approve_university'])->name('filter-approved-university');

            Route::get("un-approve-university/{id?}", [UniversityController::class, 'view_unapprove_university'])->name('unapproved-university');
            Route::get("filter-un-approve-university", [UniversityController::class, 'view_unapprove_university'])->name('filter-unapproved-university');
            Route::get("updation-manage-university", [UniversityController::class, 'update_university'])->name('update-university');
            Route::get("due_student_amount", [AccountingController::class, 'due_amount_student'])->name('due_student_amount');


            // oel-review
            Route::get('oel-review', [UniversityController::class, 'oel_review'])->name('oel-review');
            Route::get('add-review', [UniversityController::class, 'add_review'])->name('add-review');
            Route::post('store-oel-review', [UniversityController::class, 'store_oel_review'])->name('store-oel-review');
            Route::get('edit-review/{id?}', [UniversityController::class, 'edit_oel_review'])->name('edit-review');
            Route::post('update-oel-review/{id?}', [UniversityController::class, 'update_oel_review'])->name('update-oel-review');
            Route::get('delete-review/{id?}', [UniversityController::class, 'delete_oel_review'])->name('delete-review');


            // oel type
            Route::get('university-type', [UniversityController::class, 'oel_type'])->name('oel-type');
            Route::get('add-type', [UniversityController::class, 'add_type'])->name('add-type');
            Route::post('store-oel-type', [UniversityController::class, 'store_oel_type'])->name('store-oel-type');
            Route::get('edit-type/{id?}', [UniversityController::class, 'edit_oel_type'])->name('edit-type');
            Route::post('update-oel-type/{id?}', [UniversityController::class, 'update_oel_type'])->name('update-oel-type');
            Route::get('delete-type/{id?}', [UniversityController::class, 'delete_oel_type'])->name('delete-type');

            // program module
            Route::get('manage-program', [ProgramController::class, 'manage_program'])->name('manage-program');
            Route::get('updation-program', [ProgramController::class, 'update_program_month'])->name('updation-program');

            Route::get('add-program', [ProgramController::class, 'add_program'])->name('add-program');
            Route::get('get-program-sub-discipline', [ProgramController::class, 'get_program_sub_discipline'])->name('get-program-sub-discipline');
            Route::post('get-education-level', [ProgramController::class, 'get_education_level'])->name('get-education-level');
            Route::post('store-program', [ProgramController::class, 'store_program'])->name('store-program');
            Route::get('edit-program/{id}', [ProgramController::class, 'edit_program'])->name('edit-program');
            Route::Post('update-program/{id}', [ProgramController::class, 'update_program'])->name('update-program');
            Route::post('req_score_prog_add', [ProgramController::class, 'req_score_prog_add'])->name('req-score-prog-add');
            Route::get('req_score_prog', [ProgramController::class, 'fetch_req_score_prog'])->name('fetch-req-score-prog');
            Route::post('update_program_commission', [ProgramController::class, 'update_program_commission'])->name('update-program-commission');
            Route::Post('get-program-commission/{id?}', [ProgramController::class, 'get_program_commission'])->name('get-program-commission');
            Route::get('delete-score-program/{id?}', [ProgramController::class, 'delete_score_program'])->name('delete-score-program');
            Route::post('/toggle-approval', [ProgramController::class, 'toggleApproval'])->name('toggle.approval');

            // by vinay
            Route::get('edit-score-program/{id?}', [ProgramController::class, 'edit_score_program'])->name('edit-score-program');
            Route::post('score_prog_add/{id?}', [ProgramController::class, 'score_prog_add'])->name('score-prog-add');

            Route::post('update-score-program', [ProgramController::class, 'updateScoreProgram'])->name('update-score-program');

            Route::get('program-filter', [ProgramController::class, 'manage_program'])->name('program-filter');
            Route::get('approve-program', [ProgramController::class, 'approve_program'])->name('approve-program');
            Route::get('view-program/{id?}', [ProgramController::class, 'view_program'])->name('view-program');
            Route::post('education-level-fetch', [ProgramController::class, 'education_level_fetch'])->name('education-level-fetch');
            Route::post('fetch-scheme-data', [ProgramController::class, 'fetch_scheme_data'])->name('fetch-scheme-data');
            Route::post('fetch-other-exam', [ProgramController::class, 'other_exam'])->name('fetch-other-exam');

            Route::get('approve-program-filter', [ProgramController::class, 'approve_program'])->name('approve-program-filter');
            Route::get('program-level-details', [ProgramController::class, 'program_level_details'])->name('program-level-details');
            Route::get('edit-program-details/{id?}', [ProgramController::class, 'edit_program_details'])->name('edit-program-details');
            Route::get('delete-program-details/{id?}', [ProgramController::class, 'delete_program_details'])->name('delete-program-details');
            Route::post('update-home-program-details/{id?}', [ProgramController::class, 'update_program_details'])->name('update-home-program-details');
            Route::get('create-new-program-details', [ProgramController::class, 'create_program_details'])->name('create-new-program-details');
            Route::post('store-program-details', [ProgramController::class, 'store_program_details'])->name('store-program-details');


            Route::get('program-sub-level', [ProgramController::class, 'program_sub_level'])->name('program-sub-level');
            // Route::get('program-sub-level-filter',[ProgramController::class,'program_sub_level'])->name('program-sub-level-filter');
            Route::get('edit-program-sub-level/{id?}', [ProgramController::class, 'program_sub_level_edit'])->name('edit-program-sub-level');
            Route::get('delete-program-sub-level/{id?}', [ProgramController::class, 'delete_program_sub_level'])->name('delete-program-sub-level');
            Route::post('update-program-sub-level/{id?}', [ProgramController::class, 'program_sub_level_update'])->name('update-program-sub-level');
            Route::get('create-new-program-sub-level', [ProgramController::class, 'program_sub_level_create'])->name('create-new-program-sub-level');
            Route::post('store-program-sub-level', [ProgramController::class, 'program_sub_level_store'])->name('store-program-sub-level');

            // EducationLevel
            Route::get('education-level', [ProgramController::class, 'education_level'])->name('education-level');
            //Route::get('education-level-filter',[ProgramController::class,'education_level'])->name('education-level-filter');
            Route::get('edit-education-level/{id?}', [ProgramController::class, 'education_level_edit'])->name('edit-education-level');
            Route::get('delete-education-level/{id?}', [ProgramController::class, 'education_level_delete'])->name('delete-education-level');
            Route::post('update-education-level/{id?}', [ProgramController::class, 'education_level_update'])->name('update-education-level');
            Route::get('create-new-education-level', [ProgramController::class, 'education_level_create'])->name('create-new-education-level');
            Route::post('store-education-level', [ProgramController::class, 'education_level_store'])->name('store-education-level');
            // Program level
            Route::get('program-level', [ProgramController::class, 'program_level'])->name('program-level');
            // Route::get('program-level-filter',[ProgramController::class,'program_level'])->name('program-level-filter');
            Route::get('edit-program_level/{id?}', [ProgramController::class, 'program_level_edit'])->name('edit-program_level');
            Route::get('delete-program-level/{id?}', [ProgramController::class, 'program_level_delete'])->name('delete-program-level');
            Route::post('update-program-level/{id?}', [ProgramController::class, 'program_level_update'])->name('update-program-level');
            Route::get('create-new-program_level', [ProgramController::class, 'program_level_create'])->name('create-new-program_level');
            Route::post('store-program-level', [ProgramController::class, 'program_level_store'])->name('store-program-level');

            // documents
            Route::get('documents', [ProgramController::class, 'documents'])->name('documents');
            Route::get('edit-documents/{id?}', [ProgramController::class, 'documents_edit'])->name('edit-documents');
            Route::get('delete-documents/{id?}', [ProgramController::class, 'documents_delete'])->name('delete-documents');
            Route::post('update-documents/{id?}', [ProgramController::class, 'documents_update'])->name('update-documents');
            Route::get('create-new-documents', [ProgramController::class, 'documents_create'])->name('create-documents');
            Route::post('store-documents', [ProgramController::class, 'documents_store'])->name('store-documents');


            // PROGRAM DISPLINE

            Route::get('program-discipline', [ProgramController::class, 'program_discipline'])->name('program-discipline');
            Route::get('edit-program-discipline/{id?}', [ProgramController::class, 'program_discipline_edit'])->name('edit-program-discipline');
            Route::get('delete-program-discipline/{id?}', [ProgramController::class, 'program_discipline_delete'])->name('delete-program-discipline');
            Route::post('update-program-discipline/{id?}', [ProgramController::class, 'program_discipline_update'])->name('update-program-discipline');
            Route::get('create-new-program-discipline', [ProgramController::class, 'program_discipline_create'])->name('create-program-discipline');
            Route::post('store-program-discipline', [ProgramController::class, 'program_discipline_store'])->name('store-program-discipline');


            // PROGRAM SUB DISCIPLINE
            Route::get('program-subdiscipline', [ProgramController::class, 'program_subdiscipline'])->name('program-subdiscipline');
            Route::get('edit-program-subdiscipline/{id?}', [ProgramController::class, 'program_subdiscipline_edit'])->name('edit-program-subdiscipline');
            Route::get('delete-program-subdiscipline/{id?}', [ProgramController::class, 'program_subdiscipline_delete'])->name('delete-program-subdiscipline');
            Route::post('update-program-subdiscipline/{id?}', [ProgramController::class, 'program_subdiscipline_update'])->name('update-program-subdiscipline');
            Route::get('create-new-program-subdiscipline', [ProgramController::class, 'program_subdiscipline_create'])->name('create-program-subdiscipline');
            Route::post('store-program-subdiscipline', [ProgramController::class, 'program_subdiscipline_store'])->name('store-program-subdiscipline');

            // grading scheme
            Route::get('grading-scheme', [ProgramController::class, 'grading_scheme'])->name('grading-scheme');
            // Route::get('grading-scheme-filter',[ProgramController::class,'grading_scheme'])->name('grading-scheme-filter');
            Route::get('create-new-grading-scheme', [ProgramController::class, 'grading_scheme_create'])->name('create-new-grading-scheme');
            Route::get('edit-grading-scheme/{id?}', [ProgramController::class, 'grading_scheme_edit'])->name('edit-grading-scheme');
            Route::get('delete-grading-scheme/{id?}', [ProgramController::class, 'grading_scheme_delete'])->name('delete-grading-scheme');
            Route::post('update-grading-scheme/{id?}', [ProgramController::class, 'grading_scheme_update'])->name('update-grading-scheme');
            Route::post('store-grading-scheme', [ProgramController::class, 'grading_scheme_store'])->name('store-grading-scheme');

            // exam
            Route::get('exams', [ProgramController::class, 'exam'])->name('exam');
            // Route::get('exam-filter',[ProgramController::class,'exam'])->name('exam-filter');
            Route::get('create-new-exam', [ProgramController::class, 'exam_create'])->name('create-exam');
            Route::get('edit-exam/{id?}', [ProgramController::class, 'exam_edit'])->name('edit-exam');
            Route::get('delete-exam/{id?}', [ProgramController::class, 'exam_delete'])->name('delete-exam');
            Route::post('update-exam/{id?}', [ProgramController::class, 'exam_update'])->name('update-exam');
            Route::post('store-exam', [ProgramController::class, 'exam_store'])->name('store-exam');
            Route::get('delete-exam/{id?}', [ProgramController::class, 'exam_delete'])->name('delete-exam');

            // proficiency table
            Route::get('eng-proficiency-level', [ProgramController::class, 'eng_proficiency_level'])->name('eng-proficiency-level');
            Route::get('create-eng-proficiency-level', [ProgramController::class, 'eng_proficiency_level_create'])->name('create-eng-proficiency-level');
            Route::get('edit-eng-proficiency-level/{id?}', [ProgramController::class, 'eng_proficiency_level_edit'])->name('edit-eng-proficiency-level');
            Route::get('delete-eng-proficiency-level/{id?}', [ProgramController::class, 'eng_proficiency_level_delete'])->name('delete-eng-proficiency-level');
            Route::post('update-eng-proficiency-level/{id?}', [ProgramController::class, 'eng_proficiency_level_update'])->name('update-eng-proficiency-level');
            Route::post('store-eng-proficiency-level', [ProgramController::class, 'eng_proficiency_level_store'])->name('store-eng-proficiency-level');
            Route::get('delete-eng-proficiency-level/{id?}', [ProgramController::class, 'eng_proficiency_level_delete'])->name('delete-eng-proficiency-level');

            // field-of-study
            Route::get('field-of-study-types', [ProgramController::class, 'field_of_study'])->name('field-of-study');
            // Route::get('field-of-study-filter',[ProgramController::class,'field_of_study'])->name('field-of-study-filter');
            Route::get('create-field-of-study', [ProgramController::class, 'field_of_study_create'])->name('create-field-of-study');
            Route::get('edit-field-of-study/{id?}', [ProgramController::class, 'field_of_study_edit'])->name('edit-field-of-study');
            Route::get('delete-field-of-study/{id?}', [ProgramController::class, 'field_of_study_delete'])->name('delete-field-of-study');
            Route::post('update-field-of-study/{id?}', [ProgramController::class, 'field_of_study_update'])->name('update-field-of-study');
            Route::post('store-field-of-study', [ProgramController::class, 'field_of_study_store'])->name('store-field-of-study');
            Route::get('delete-field-of-study/{id?}', [ProgramController::class, 'field_of_study_delete'])->name('delete-field-of-study');
            // subjects
            Route::get('subjects', [ProgramController::class, 'subjects'])->name('subject');
            Route::get('subject-filter', [ProgramController::class, 'subjects'])->name('subjects-filter');
            Route::get('create-subject', [ProgramController::class, 'subjects_create'])->name('create-subjects');
            Route::get('edit-subject/{id?}', [ProgramController::class, 'subjects_edit'])->name('edit-subject');
            Route::get('delete-subject/{id?}', [ProgramController::class, 'subjects_delete'])->name('delete-subject');
            Route::post('update-subject/{id?}', [ProgramController::class, 'subjects_update'])->name('update-subject');
            Route::post('store-subject', [ProgramController::class, 'subjects_store'])->name('store-subject');

            Route::get('rack-master', [OtherMasterDataController::class, 'rack_master'])->name('rack-master');
            Route::get('rack-master/filter', [OtherMasterDataController::class, 'rack_master'])->name('rack-master.filter');
            Route::get('rack-master/create', [OtherMasterDataController::class, 'rack_master_create'])->name('rack-master.create');
            Route::post('rack-master/store', [OtherMasterDataController::class, 'rack_master_store'])->name('rack-master.store');
            Route::get('rack-master/edit/{id}', [OtherMasterDataController::class, 'rack_master_edit'])->name('rack-master.edit');
            Route::put('rack-master/update/{id}', [OtherMasterDataController::class, 'rack_master_update'])->name('rack-master.update');
            Route::get('rack-master/delete/{id}', [OtherMasterDataController::class, 'rack_master_delete'])->name('rack-master.delete');

            // source   //
            Route::get('material-master', [OtherMasterDataController::class, 'index'])->name('material-master.index');
            Route::get('material-master/create', [OtherMasterDataController::class, 'create'])->name('material-master.create');
            Route::post('material-master', [OtherMasterDataController::class, 'store'])->name('material-master.store');
            Route::get('material-master/{id}/edit', [OtherMasterDataController::class, 'edit'])->name('material-master.edit');
            Route::put('material-master/{id}', [OtherMasterDataController::class, 'update'])->name('material-master.update');
            Route::delete('material-master/{id}', [OtherMasterDataController::class, 'destroy'])->name('material-master.destroy');


            //// expected salary


            // Route::get('delete-source/{id?}', [OtherMasterDataController::class, 'source_delete'])->name('delete-source');

            /// lead quality checklist

            Route::get('lead_quality', [OtherMasterDataController::class, 'lead_quality'])->name('lead_quality');
            Route::get('source-filter', [OtherMasterDataController::class, 'source'])->name('source-filter');
            Route::get('lead_quality_create', [OtherMasterDataController::class, 'lead_quality_create'])->name('lead_quality_create');
            Route::get('lead_quality_edit/{id?}', [OtherMasterDataController::class, 'lead_quality_edit'])->name('lead_quality_edit');
            // Route::get('delete-source/{id?}', [OtherMasterDataController::class, 'source_delete'])->name('delete-source');
            Route::post('lead_quality_update/{id?}', [OtherMasterDataController::class, 'lead_quality_update'])->name('lead_quality_update');
            Route::post('lead_quality_store', [OtherMasterDataController::class, 'lead_quality_store'])->name('lead_quality_store');
            Route::get('lead_quality_delete/{id?}', [OtherMasterDataController::class, 'lead_quality_delete'])->name('lead_quality_delete');


            // interested
            Route::get('interested', [OtherMasterDataController::class, 'interested'])->name('interested');
            Route::get('interested-filter', [OtherMasterDataController::class, 'interested'])->name('interested-filter');
            Route::get('create-interested', [OtherMasterDataController::class, 'interested_create'])->name('create-interested');
            Route::get('edit-interested/{id?}', [OtherMasterDataController::class, 'interested_edit'])->name('edit-interested');
            Route::get('delete-interested/{id?}', [OtherMasterDataController::class, 'interested_delete'])->name('delete-interested');
            Route::post('update-interested/{id?}', [OtherMasterDataController::class, 'interested_update'])->name('update-interested');
            Route::post('store-interested', [OtherMasterDataController::class, 'interested_store'])->name('store-interested');
            Route::get('delete-interested/{id?}', [OtherMasterDataController::class, 'interested_delete'])->name('delete-interested');

            // country
            Route::get('country', [OtherMasterDataController::class, 'country'])->name('country');
            Route::get('country-filter', [OtherMasterDataController::class, 'country'])->name('country-filter');
            Route::get('create-country', [OtherMasterDataController::class, 'country_create'])->name('create-country');
            Route::get('edit-country/{id?}', [OtherMasterDataController::class, 'country_edit'])->name('edit-country');
            Route::get('delete-country/{id?}', [OtherMasterDataController::class, 'country_delete'])->name('delete-country');
            Route::post('update-country/{id?}', [OtherMasterDataController::class, 'country_update'])->name('update-country');
            Route::post('store-country', [OtherMasterDataController::class, 'country_store'])->name('store-country');
            Route::get('delete-country/{id?}', [OtherMasterDataController::class, 'country_delete'])->name('delete-country');
            Route::post("update-country-status", [OtherMasterDataController::class, 'updateCountryStatus'])->name('activeInactiveCountry');
            // provience
            Route::get('province', [OtherMasterDataController::class, 'province'])->name('province');
            Route::get('province-filter', [OtherMasterDataController::class, 'province'])->name('province-filter');
            Route::get('create-province', [OtherMasterDataController::class, 'province_create'])->name('create-province');
            Route::get('edit-province/{id?}', [OtherMasterDataController::class, 'province_edit'])->name('edit-province');
            Route::get('delete-province/{id?}', [OtherMasterDataController::class, 'province_delete'])->name('delete-province');
            Route::post('update-province/{id?}', [OtherMasterDataController::class, 'province_update'])->name('update-province');
            Route::post('store-province', [OtherMasterDataController::class, 'province_store'])->name('store-province');
            Route::get('delete-province/{id?}', [OtherMasterDataController::class, 'province_delete'])->name('delete-province');
            // visa-type
            Route::get('visa-type', [OtherMasterDataController::class, 'visa_type'])->name('visa-type');
            Route::get('visa-type-filter', [OtherMasterDataController::class, 'visa_type'])->name('visa-type-filter');
            Route::get('create-visa-type', [OtherMasterDataController::class, 'visa_type_create'])->name('create-visa-type');
            Route::get('edit-visa-type/{id?}', [OtherMasterDataController::class, 'visa_type_edit'])->name('edit-visa-type');
            Route::get('delete-visa-type/{id?}', [OtherMasterDataController::class, 'visa_type_delete'])->name('delete-visa-type');
            Route::post('update-visa-type/{id?}', [OtherMasterDataController::class, 'visa_type_update'])->name('update-visa-type');
            Route::post('store-visa-type', [OtherMasterDataController::class, 'visa_type_store'])->name('store-visa-type');
            Route::get('delete-visa-type/{id?}', [OtherMasterDataController::class, 'visa_type_delete'])->name('delete-visa-type');
            // faq
            Route::get('faqs', [OtherMasterDataController::class, 'faq'])->name('faq');
            Route::get('faq-filter', [OtherMasterDataController::class, 'faq'])->name('faq-filter');
            Route::get('create-faq', [OtherMasterDataController::class, 'faq_create'])->name('create-faq');
            Route::get('edit-faq/{id?}', [OtherMasterDataController::class, 'faq_edit'])->name('edit-faq');
            Route::get('delete-faq/{id?}', [OtherMasterDataController::class, 'faq_delete'])->name('delete-faq');
            Route::post('update-faq/{id?}', [OtherMasterDataController::class, 'faq_update'])->name('update-faq');
            Route::post('store-faq', [OtherMasterDataController::class, 'faq_store'])->name('store-faq');
            Route::get('delete-faq/{id?}', [OtherMasterDataController::class, 'faq_delete'])->name('delete-faq');
            // vas-service
            Route::get('vas-services', [OtherMasterDataController::class, 'vas_service'])->name('vas-service');
            Route::get('vas-service-filter', [OtherMasterDataController::class, 'vas_service'])->name('vas-service-filter');
            Route::get('create-vas-service', [OtherMasterDataController::class, 'vas_service_create'])->name('create-vas-service');
            Route::get('edit-vas-service/{id?}', [OtherMasterDataController::class, 'vas_service_edit'])->name('edit-vas-service');
            Route::get('delete-vas-service/{id?}', [OtherMasterDataController::class, 'vas_service_delete'])->name('delete-vas-service');
            Route::post('update-vas-service/{id?}', [OtherMasterDataController::class, 'vas_service_update'])->name('update-vas-service');
            Route::post('store-vas-service', [OtherMasterDataController::class, 'vas_service_store'])->name('store-vas-service');
            Route::get('delete-vas-service/{id?}', [OtherMasterDataController::class, 'vas_service_delete'])->name('delete-vas-service');

            //  other document type

            Route::get('visa-document-type', [OtherMasterDataController::class, 'visa_document_type'])->name('visa-document-type');
            Route::get('visa-document-type-filter', [OtherMasterDataController::class, 'visa_document_type'])->name('visa-document-type-filter');
            Route::get('create-visa-document-type', [OtherMasterDataController::class, 'visa_document_type_create'])->name('create-visa-document-type');
            Route::get('edit-visa-document-type/{id?}', [OtherMasterDataController::class, 'visa_document_type_edit'])->name('edit-visa-document-type');
            Route::get('delete-visa-document-type/{id?}', [OtherMasterDataController::class, 'visa_document_type_delete'])->name('delete-visa-document-type');
            Route::post('update-visa-document-type/{id?}', [OtherMasterDataController::class, 'visa_document_type_update'])->name('update-visa-document-type');
            Route::post('store-visa-document-type', [OtherMasterDataController::class, 'visa_document_type_store'])->name('store-visa-document-type');
            Route::get('delete-visa-document-type/{id?}', [OtherMasterDataController::class, 'visa_document_type_delete'])->name('delete-visa-document-type');


            Route::get('visa-sub-document-type', [OtherMasterDataController::class, 'visa_sub_document_type'])->name('visa-sub-document-type');
            Route::get('visa-sub-document-type-filter', [OtherMasterDataController::class, 'visa_sub_document_type'])->name('visa-sub-document-type-filter');
            Route::get('create-visa-sub-document-type', [OtherMasterDataController::class, 'visa_sub_document_type_create'])->name('create-visa-sub-document-type');
            Route::get('edit-visa-sub-document-type/{id?}', [OtherMasterDataController::class, 'visa_sub_document_type_edit'])->name('edit-visa-sub-document-type');
            Route::get('delete-visa-sub-document-type/{id?}', [OtherMasterDataController::class, 'visa_sub_document_type_delete'])->name('delete-visa-sub-document-type');
            Route::post('update-visa-sub-document-type/{id?}', [OtherMasterDataController::class, 'visa_sub_document_type_update'])->name('update-visa-sub-document-type');
            Route::post('store-visa-sub-document-type', [OtherMasterDataController::class, 'visa_sub_document_type_store'])->name('store-visa-sub-document-type');
            Route::get('delete-visa-sub-document-type/{id?}', [OtherMasterDataController::class, 'visa_sub_document_type_delete'])->name('delete-visa-sub-document-type');


            // Education Lane
            Route::get('education-lane', [OtherMasterDataController::class, 'education_lane'])->name('education-lane');
            Route::get('education-lane-filter', [OtherMasterDataController::class, 'education_lane'])->name('education-lane-filter');
            Route::get('create-education-lane', [OtherMasterDataController::class, 'education_lane_create'])->name('create-education-lane');
            Route::get('edit-education-lane/{id?}', [OtherMasterDataController::class, 'education_lane_edit'])->name('edit-education-lane');
            Route::get('delete-education-lane/{id?}', [OtherMasterDataController::class, 'education_lane_delete'])->name('delete-education-lane');
            Route::post('update-education-lane/{id?}', [OtherMasterDataController::class, 'education_lane_update'])->name('update-education-lane');
            Route::post('store-education-lane', [OtherMasterDataController::class, 'education_lane_store'])->name('store-education-lane');
            Route::get('delete-education-lane/{id?}', [OtherMasterDataController::class, 'education_lane_delete'])->name('delete-education-lane');

            // scholorship
            Route::get('scholarship/{id?}', [StudentController::class, 'scholarship'])->name('scholarship');
            Route::get('scholarship-filter', [StudentController::class, 'scholarship'])->name('scholarship-filter');
            Route::get('create-scholorship', [StudentController::class, 'scholarship_create'])->name('create-scholarship');
            Route::get('edit-scholarship/{id?}', [StudentController::class, 'scholarship_edit'])->name('edit-scholarship');
            Route::get('delete-scholarship/{id?}', [StudentController::class, 'scholarship_delete'])->name('delete-scholarship');
            Route::post('update-scholarship/{id?}', [StudentController::class, 'scholarship_update'])->name('update-scholarship');
            Route::post('store-scholarship', [StudentController::class, 'scholarship_store'])->name('store-scholarship');
            Route::get('check-education-attended', [StudentController::class, 'check_student_attended'])->name('check-education-attended');
            Route::get('fetch-documents', [StudentController::class, 'fetch_documents'])->name('fetch-documents');
            Route::get('fetch-payment-details', [StudentController::class, 'fetch_payment_details'])->name('fetch-payment-details');

            /// accounting


            // Blogs
            Route::get('blogs/{id?}', [CmsController::class, 'blogs'])->name('blogs');
            Route::get('blogs-filter', [CmsController::class, 'blogs'])->name('blogs-filter');
            Route::get('create-blogs', [CmsController::class, 'blogs_create'])->name('create-blogs');
            Route::get('edit-blogs/{id?}', [CmsController::class, 'blogs_edit'])->name('edit-blogs');
            Route::get('delete-blogs/{id?}', [CmsController::class, 'blogs_delete'])->name('delete-blogs');
            Route::post('update-blogs/{id?}', [CmsController::class, 'blogs_update'])->name('update-blogs');
            Route::post('store-blogs', [CmsController::class, 'blogs_store'])->name('store-blogs');

            // service landing page

            Route::prefix('service')->group(function () {
                Route::get('/', [CmsController::class, 'service'])->name('service.index');
                Route::get('create', [CmsController::class, 'service_create'])->name('service.create');
                Route::get('edit/{id?}', [CmsController::class, 'service_edit'])->name('service.edit');
                Route::get('delete/{id?}', [CmsController::class, 'service_delete'])->name('service.delete');
                Route::post('update/{id?}', [CmsController::class, 'service_update'])->name('service.update');
                Route::post('store', [CmsController::class, 'service_store'])->name('service.store');
            });
            Route::prefix('instagram')->group(function () {
                Route::get('/', [CmsController::class, 'instagram'])->name('instagram.index');
                Route::get('create', [CmsController::class, 'instagram_create'])->name('instagram.create');
                Route::get('edit/{id?}', [CmsController::class, 'instagram_edit'])->name('instagram.edit');
                Route::get('delete/{id?}', [CmsController::class, 'instagram_delete'])->name('instagram.delete');
                Route::post('update/{id?}', [CmsController::class, 'instagram_update'])->name('instagram.update');
                Route::post('store', [CmsController::class, 'instagram_store'])->name('instagram.store');
            });

            Route::get('master-service/{id?}', [OtherMasterDataController::class, 'master_service'])->name('master_service');
            Route::get('create-master-service', [OtherMasterDataController::class, 'master_service_create'])->name('create-master-service');
            Route::get('edit-master-service/{id?}', [OtherMasterDataController::class, 'master_service_edit'])->name('edit-master-service');
            Route::get('delete-master-service/{id?}', [OtherMasterDataController::class, 'master_service_delete'])->name('delete-master-service');
            Route::post('update-master-service/{id?}', [OtherMasterDataController::class, 'master_service_update'])->name('update-master-service');
            Route::post('store-master-service', [OtherMasterDataController::class, 'master_service_store'])->name('store-master-service');
            // SubService
            Route::prefix('subservice')->group(function () {
                Route::get('/', [CmsController::class, 'subservice'])->name('subservice.index');
                Route::get('create', [CmsController::class, 'subservice_create'])->name('subservice.create');
                Route::get('edit/{id?}', [CmsController::class, 'subservice_edit'])->name('subservice.edit');
                Route::get('delete/{id?}', [CmsController::class, 'subservice_delete'])->name('subservice.delete');
                Route::post('update/{id?}', [CmsController::class, 'subservice_update'])->name('subservice.update');
                Route::post('store', [CmsController::class, 'subservice_store'])->name('subservice.store');
            });
            Route::get('sub-service/{id?}', [OtherMasterDataController::class, 'sub_service'])->name('sub_service');
            Route::get('create-sub-service', [OtherMasterDataController::class, 'sub_service_create'])->name('create-sub-service');
            Route::get('edit-sub-service/{id?}', [OtherMasterDataController::class, 'sub_service_edit'])->name('edit-sub-service');
            Route::get('delete-sub-service/{id?}', [OtherMasterDataController::class, 'sub_service_delete'])->name('delete-sub-service');
            Route::post('update-sub-service/{id?}', [OtherMasterDataController::class, 'sub_service_update'])->name('update-sub-service');
            Route::post('store-sub-service', [OtherMasterDataController::class, 'sub_service_store'])->name('store-sub-service');
            Route::post('get-sub-service', [OtherMasterDataController::class, 'get_sub_service'])->name('get-sub-service');
            Route::post('get-app-fee', [OtherMasterDataController::class, 'get_app_fee'])->name('get-app-fee');


            // testimonial


            Route::get('testimonial/{id?}', [CmsController::class, 'testimonial'])->name('testimonial');
            Route::get('testimonial-filter', [CmsController::class, 'testimonial'])->name('testimonial-filter');
            Route::get('create-testimonial', [CmsController::class, 'testimonial_create'])->name('create-testimonial');
            Route::get('edit-testimonial/{id?}', [CmsController::class, 'testimonial_edit'])->name('edit-testimonial');
            Route::get('delete-testimonial/{id?}', [CmsController::class, 'testimonial_delete'])->name('delete-testimonial');
            Route::post('update-testimonial/{id?}', [CmsController::class, 'testimonial_update'])->name('update-testimonial');
            Route::post('store-testimonial', [CmsController::class, 'testimonial_store'])->name('store-testimonial');

            // feedbackvideo
            Route::get('feedbackvideo/{id?}', [CmsController::class, 'feedbackvideo'])->name('feedbackvideo');
            Route::get('create-feedbackvideo', [CmsController::class, 'feedbackvideo_create'])->name('create-feedbackvideo');
            Route::get('edit-feedbackvideo/{id?}', [CmsController::class, 'feedbackvideo_edit'])->name('edit-feedbackvideo');
            Route::get('delete-feedbackvideo/{id?}', [CmsController::class, 'feedbackvideo_delete'])->name('delete-feedbackvideo');
            Route::post('update-feedbackvideo/{id?}', [CmsController::class, 'feedbackvideo_update'])->name('update-feedbackvideo');
            Route::post('store-feedbackvideo', [CmsController::class, 'feedbackvideo_store'])->name('store-feedbackvideo');

            // message lead
            Route::get('message-lead', [MessageController::class, 'message_lead'])->name('message-lead');
            Route::get('message-franchise', [MessageController::class, 'message_frenchise'])->name('message-frenchise');
            Route::get('message-student', [MessageController::class, 'message_student'])->name('message-student');
            Route::get('message-lead', [MessageController::class, 'message_lead'])->name('message-lead');
            Route::post('send-sms', [MessageController::class, 'sendSmsToLeadUsers'])->name('send-sms');
            Route::post('send-email', [MessageController::class, 'sendEmailToLeadUsers'])->name('send-email');
            Route::post('send-sms-frenchise', [MessageController::class, 'sendSmsToFrenchise'])->name('send-sms-frenchise');
            Route::post('send-email-frenchise', [MessageController::class, 'sendEmailToFrenchise'])->name('send-email-frenchise');
            Route::post('send-sms-student', [MessageController::class, 'sendSmsToStudent'])->name('send-sms-student');
            Route::post('send-email-student', [MessageController::class, 'sendEmailToStudent'])->name('send-email-student');
            Route::get('outbox', [MessageController::class, 'outbox'])->name('outbox');
            Route::get('trash', [MessageController::class, 'trash'])->name('trash');
            Route::post('delete-sms', [MessageController::class, 'delete_sms'])->name('delete-sms');
            Route::post('delete-sms-permanent', [MessageController::class, 'delete_outbox'])->name('delete-sms-permanent');
            // sms-template

            Route::get('sms-template/{id?}', [MessageController::class, 'sms_template'])->name('sms-template');
            Route::get('sms-template-filter', [MessageController::class, 'sms_template'])->name('sms-template-filter');
            Route::get('create-sms-template', [MessageController::class, 'sms_template_create'])->name('create-sms-template');
            Route::get('edit-sms-template/{id?}', [MessageController::class, 'sms_template_edit'])->name('edit-sms-template');
            Route::get('delete-sms-template/{id?}', [MessageController::class, 'sms_template_delete'])->name('delete-sms-template');
            Route::post('update-sms-template/{id?}', [MessageController::class, 'sms_template_update'])->name('update-sms-template');
            Route::post('store-sms-template', [MessageController::class, 'sms_template_store'])->name('store-sms-template');
            Route::post('show-lead-sms', [MessageController::class, 'show_msg'])->name('show-lead-sms');
            Route::post('show-lead-email', [MessageController::class, 'show_email'])->name('show-lead-email');

            Route::get('learning-franchise', [LearningTrainingController::class, 'learning_franchise'])->name('learning-franchise.index');
            Route::get('create-learning-franchise', [LearningTrainingController::class, 'create_learning_franchise'])->name('learning-franchise.create');
            Route::get('edit-learning-franchise/{id?}', [LearningTrainingController::class, 'edit_learning_franchise'])->name('learning-franchise.edit');
            Route::Post('store-learning-franchise', [LearningTrainingController::class, 'store_learning_franchise'])->name('learning-franchise.store');
            Route::post('update-learning-franchise/{id?}', [LearningTrainingController::class, 'update_learning_franchise'])->name('learning-franchise.update');
            Route::get('delete-learning-franchise/{id?}', [LearningTrainingController::class, 'delete_learning_franchise'])->name('learning-franchise.delete');
            Route::get('learning-franchise-request/{id?}', [LearningTrainingController::class, 'request_learning_franchise'])->name('learning-franchise.request');


            ///////application configuration

            Route::get('application-franchise', [LearningTrainingController::class, 'learning_franchise'])->name('learning-franchise.index');
            Route::get('create-application-franchise', [LearningTrainingController::class, 'create_learning_franchise'])->name('learning-franchise.create');
            Route::get('edit-application-franchise/{id?}', [LearningTrainingController::class, 'edit_learning_franchise'])->name('learning-franchise.edit');
            Route::Post('store-application-franchise', [LearningTrainingController::class, 'store_learning_franchise'])->name('learning-franchise.store');
            Route::post('update-application-franchise/{id?}', [LearningTrainingController::class, 'update_learning_franchise'])->name('learning-franchise.update');
            Route::get('delete-learning-franchise/{id?}', [LearningTrainingController::class, 'delete_learning_franchise'])->name('learning-franchise.delete');
            Route::get('learning-franchise-request/{id?}', [LearningTrainingController::class, 'request_learning_franchise'])->name('learning-franchise.request');



            Route::get('learning-student', [LearningTrainingController::class, 'learning_franchise'])->name('learning-student.index');
            Route::get('create-learning-student', [LearningTrainingController::class, 'create_learning_franchise'])->name('learning-student.create');
            Route::get('edit-learning-student/{id?}', [LearningTrainingController::class, 'edit_learning_franchise'])->name('learning-student.edit');
            Route::Post('store-learning-student', [LearningTrainingController::class, 'store_learning_franchise'])->name('learning-student.store');
            Route::post('update-learning-student/{id?}', [LearningTrainingController::class, 'update_learning_franchise'])->name('learning-student.update');
            Route::get('delete-learning-student/{id?}', [LearningTrainingController::class, 'delete_learning_franchise'])->name('learning-student.delete');
            Route::get('learning-student-request/{id?}', [LearningTrainingController::class, 'request_learning_franchise'])->name('learning-student.request');

            Route::get('learning-agent', [LearningTrainingController::class, 'learning_franchise'])->name('learning-agent.index');
            Route::get('create-learning-agent', [LearningTrainingController::class, 'create_learning_franchise'])->name('learning-agent.create');
            Route::get('edit-learning-agent/{id?}', [LearningTrainingController::class, 'edit_learning_franchise'])->name('learning-agent.edit');
            Route::Post('store-learning-agent', [LearningTrainingController::class, 'store_learning_franchise'])->name('learning-agent.store');
            Route::post('update-learning-agent/{id?}', [LearningTrainingController::class, 'update_learning_franchise'])->name('learning-agent.update');
            Route::get('delete-learning-agent/{id?}', [LearningTrainingController::class, 'delete_learning_franchise'])->name('learning-agent.delete');
            Route::get('learning-agent-request/{id?}', [LearningTrainingController::class, 'request_learning_franchise'])->name('learning-agent.request');
            // training-request
            Route::get('franchise-training', [LearningTrainingController::class, 'training_request'])->name('franchise-training.index');
            Route::get('franchise-training-delete/{id?}', [LearningTrainingController::class, 'training_request_delete'])->name('franchise-training.delete');
            Route::get('agent-training-delete/{id?}', [LearningTrainingController::class, 'training_request_delete'])->name('agent-training.delete');
            Route::get('student-training-delete/{id?}', [LearningTrainingController::class, 'training_request_delete'])->name('student-training.delete');
            Route::get('agents-training', [LearningTrainingController::class, 'training_request'])->name('agents-training.index');
            Route::get('student-training', [LearningTrainingController::class, 'training_request'])->name('student-training.index');
        });
        Route::prefix('franchise')->group(function () {
            // frenchise
            Route::get("franchise-list", [FrenchiseController::class, 'index'])->name('frenchise.index');
            Route::get("create-franchise", [FrenchiseController::class, 'create'])->name('frenchise-create');
            Route::get("edit-franchise/{id?}", [FrenchiseController::class, 'edit'])->name('frenchise-edit');
            Route::Post("store-franchise", [FrenchiseController::class, 'store'])->name('frenchise-store');
            //    Route::get("pincode",[FrenchiseController::class,'pincode'])->name('frenchise-pincode');
            Route::get("manage-oel-presentation", [FrenchiseController::class, 'manage_oel_pres'])->name('manage-oel-pres');
            Route::post("manage-oel-presentation", [FrenchiseController::class, 'store_manage_oel_pres'])->name('store-manage-oel-pres');
            Route::get("delete-manage-oel-presentation/{id?}", [FrenchiseController::class, 'delete_manage_oel_pres'])->name('delete-manage-oel-presentation');
            Route::match(['get', 'post'], 'frenchise-filter/{action?}', [FrenchiseController::class, 'index'])->name('frenchise-filter');
            Route::get("manage-oel-agreement-letter", [FrenchiseController::class, 'manage_oel_agreement'])->name('manage-oel-agreement');
            Route::post("manage-oel-agreement", [FrenchiseController::class, 'store_manage_oel_agreement'])->name('store-manage-oel-agreement');
        });
        Route::prefix('data-operator')->group(function () {
            Route::get("data-operator-list", [DataOperatorController::class, 'index'])->name('data-operator');
            Route::get("data-operator-create", [DataOperatorController::class, 'create'])->name('data-operator-create');
            Route::post("data-operator-store", [DataOperatorController::class, 'store'])->name('data-operator-store');
            Route::get("data-operator-edit/{id}", [DataOperatorController::class, 'edit'])->name('data-operator-edit');
            Route::post("data-operator-update/{id}", [DataOperatorController::class, 'update'])->name('data-operator-update');
            Route::get("data-operator-delete/{id}", [DataOperatorController::class, 'delete'])->name('data-operator-delete');
        });
        Route::prefix('accounting')->controller(AccountingController::class)->group(function () {
            Route::get('/dashboard', 'index')->name('accounting');
            Route::get('/student-review', 'student_review')->name('student-review');
            Route::get('/student-reviews/{id?}', 'student_view')->name('view-student-reviews');

            Route::get('/student-invoice/{id?}', 'student_invoice')->name('view-student-invoice');
        });
        Route::prefix('student')->group(function () {
            Route::get('applied-program', [StudentController::class, 'applied_program'])->name('applied-program');
            Route::get("my-profile", [StudentController::class, 'student_profile'])->name('student-profile');
            Route::get("edit-profile", [StudentController::class, 'edit_student'])->name('student-edit');
            Route::post("store-profile", [StudentController::class, 'store_student'])->name('student/student-store');
            Route::post("grading-scheme-list", [StudentController::class, 'grading_scheme_list'])->name('grading-scheme-list');
            Route::post('update-attended-school', [StudentController::class, 'update_attendended_school'])->name('update-attended-school');
            Route::get('delete-student-attendence/{id?}', [StudentController::class, 'delete_attendended'])->name('delete-student-attendence');
            Route::get('delete-student-test-score/{id?}', [StudentController::class, 'delete_test_score'])->name('delete-student-test-score');
            Route::post('update-gre-exam-data/{id?}', [StudentController::class, 'update_gre_exam_data'])->name('update-gre-exam-data');
            Route::get('edit-test-score/{id?}', [StudentController::class, 'edit_test_score'])->name('edit-test-score');
            Route::post('update-gmat-exam-data/{id?}', [StudentController::class, 'update_gmat_exam_data'])->name('update-gmat-exam-data');
            Route::post('update-test-score/{id?}', [StudentController::class, 'update_test_score'])->name('update-test-score');
            Route::get('delete-student-document/{id?}', [StudentController::class, 'delete_document'])->name('delete-student-document');
            Route::get('get-student-attendence/{id?}', [StudentController::class, 'get_student_attendence'])->name('get-student-attendence');
            Route::POST('get-student-test-score/{id?}', [StudentController::class, 'get_student_test_score'])->name('get-student-test-score');
            Route::get('get-student-document', [StudentController::class, 'get_student_document'])->name('get-student-document');
            Route::post('fetch-eng-prof-level-score', [StudentController::class, 'fetch_eng_prof_level_score'])->name('fetch-eng-prof-level-score');
        });
        Route::get('/fetch-state', [LeadsManageCotroller::class, 'fetchStates'])->name('state.get');
    });
    Route::middleware(['auth'])->prefix('landing-page')->group(function () {
        Route::get("/ads", [\App\Http\Controllers\LandingPage\DashboardController::class, 'getAds'])->name('getAds');
        Route::get("create/ads", [\App\Http\Controllers\LandingPage\DashboardController::class, 'createAds'])->name('create.ads');
        Route::post("store/ads", [\App\Http\Controllers\LandingPage\DashboardController::class, 'storeAds'])->name('store.ads');
        Route::get("edit/ads/{id}", [\App\Http\Controllers\LandingPage\DashboardController::class, 'editAds'])->name('edit.ads');
        Route::post("update/ads/{id}", [\App\Http\Controllers\LandingPage\DashboardController::class, 'updateAds'])->name('update.ads');
        Route::get("delete/ads/{id}", [\App\Http\Controllers\LandingPage\DashboardController::class, 'deleteAds'])->name('delete.ads');

        /////  country_campaign

        Route::get("/country-campaign", [\App\Http\Controllers\LandingPage\DashboardController::class, 'getcountry_campaign'])->name('country-campaign');
        Route::get("create/country_campaign", [\App\Http\Controllers\LandingPage\DashboardController::class, 'createcountry_campaign'])->name('create.country_campaign');
        Route::post("store/country_campaign", [\App\Http\Controllers\LandingPage\DashboardController::class, 'storecountry_campaign'])->name('store.country_campaign');
        Route::get("edit/country_campaign/{id}", [\App\Http\Controllers\LandingPage\DashboardController::class, 'editcountry_campaign'])->name('edit.country_campaign');
        Route::post("update/country_campaign/{id}", [\App\Http\Controllers\LandingPage\DashboardController::class, 'updatecountry_campaign'])->name('update.country_campaign');
        Route::get("delete/country_campaign/{id}", [\App\Http\Controllers\LandingPage\DashboardController::class, 'deletecountry_campaign'])->name('delete.country_campaign');


        // slider
        Route::get("getSlider", [\App\Http\Controllers\LandingPage\DashboardController::class, 'getSlider'])->name('getSlider');
        Route::get("create/slider", [\App\Http\Controllers\LandingPage\DashboardController::class, 'createSlider'])->name('create.slider');
        Route::get('/fetch-states', [\App\Http\Controllers\LandingPage\DashboardController::class, 'fetchStates'])->name('states.get');
        Route::post("store/slider", [\App\Http\Controllers\LandingPage\DashboardController::class, 'storeSlider'])->name('store.slider');
        Route::get("edit/slider/{id}", [\App\Http\Controllers\LandingPage\DashboardController::class, 'editSlider'])->name('edit.slider');
        Route::get("show/slider/{id}", [\App\Http\Controllers\LandingPage\DashboardController::class, 'showSlider'])->name('show.slider');
        Route::post("update/slider/{id}", [\App\Http\Controllers\LandingPage\DashboardController::class, 'updateSlider'])->name('update.slider');
        Route::get("delete/slider/{id}", [\App\Http\Controllers\LandingPage\DashboardController::class, 'deleteSlider'])->name('delete.slider');
        Route::post("update-slider-status", [\App\Http\Controllers\LandingPage\DashboardController::class, 'updateSliderStatus'])->name('statusUpdate');
        // indexpage Data'
        Route::get("emailData", [\App\Http\Controllers\LandingPage\DashboardController::class, 'emailData'])->name('emailData');
        Route::get("email-delete/{id}", [\App\Http\Controllers\LandingPage\DashboardController::class, 'emailDelete'])->name('emailDelete');
        Route::get("contact-us", [\App\Http\Controllers\LandingPage\DashboardController::class, 'contact_us'])->name('contact-us');
        Route::get("contact-us-delete/{id}", [\App\Http\Controllers\LandingPage\DashboardController::class, 'contact_us_delete'])->name('contact-us-delete');
        // whycountry
        Route::get("country-university", [\App\Http\Controllers\LandingPage\DashboardController::class, 'countryUniversity'])->name('country.university');
        Route::get("create/country-university", [\App\Http\Controllers\LandingPage\DashboardController::class, 'createCountryUniversity'])->name('create.country.university');
        Route::post("country-university/store", [\App\Http\Controllers\LandingPage\DashboardController::class, 'storeCountryUniversity'])->name('store.country.university');
        Route::get("edit/country-university/{id}", [\App\Http\Controllers\LandingPage\DashboardController::class, 'editCountryUniversity'])->name('edit.country.university');
        Route::post("update/country-university/{id}", [\App\Http\Controllers\LandingPage\DashboardController::class, 'updateCountryUniversity'])->name('update.country.university');
        Route::get("delete/country-university/{id}", [\App\Http\Controllers\LandingPage\DashboardController::class, 'deleteCountryUniversity'])->name('delete.country.university');
    });

    Route::get('/study-in-south-korea/{id?}', [App\Http\Controllers\LandingPage\HomeController::class, 'index'])->name('study-in-south-korea');
    Route::get('/landing-page/{id?}', [App\Http\Controllers\LandingPage\HomeController::class, 'index'])->name('landing-page');


    Route::post('landing-page/get-country-data', [App\Http\Controllers\LandingPage\HomeController::class, 'getCountryData'])->name('get-country-data');
    Route::get('thank-you', [App\Http\Controllers\LandingPage\HomeController::class, 'thanks'])->name('thanks');
    Route::post('landing-page/send-mail', [App\Http\Controllers\LandingPage\HomeController::class, 'sendMail'])->name('send-mail');
    Route::get('/fetch-states', [\App\Http\Controllers\LandingPage\DashboardController::class, 'fetchStates'])->name('fetch-states.get');

    Route::get('review', [\App\Http\Controllers\LandingPage\DashboardController::class, 'review'])->name('reviw');
    Route::post('/submit-form', [\App\Http\Controllers\LandingPage\DashboardController::class, 'store'])->name('form.submit');

    Route::get('/get-countries', [FrontendController::class, 'getCountries']);
    Route::get('/get-testimonials', [FrontendController::class, 'get_testimonials']);
    Route::post('send-mail-south', [App\Http\Controllers\LandingPage\HomeController::class, 'send_mail_south'])->name('send-mail-south');
    Route::get('/study-in-uk/{id?}', [App\Http\Controllers\LandingPage\HomeController::class, 'uk'])->name('study-in-uk');
    Route::get('/study-in-usa/{id?}', [App\Http\Controllers\LandingPage\HomeController::class, 'usa'])->name('study-in-usa');
    Route::get('/study-in-canada/{id?}', [App\Http\Controllers\LandingPage\HomeController::class, 'canada'])->name('study-in-canada');
    Route::get('thank-you', [App\Http\Controllers\LandingPage\HomeController::class, 'thankss'])->name('thank-you');
    Route::get('/search-data', [FrontendController::class, '/search'])->name('/search-data');

    Route::get('/programs', [FrontendController::class, 'programs'])->name('programs');
    Route::get('/ajax/universities', [FrontendController::class, 'searchUniversities'])->name('ajax.universities');
    Route::get('/ajax/programs', [FrontendController::class, 'searchPrograms'])->name('ajax.programs');

    //Route::get('/api/fb/webhook', [FacebookLeadController::class, 'verify']);
    //Route::post('/api/fb/webhook', [FacebookLeadController::class, 'webhook']);


    require __DIR__ . '/auth.php';
