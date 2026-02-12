 <?php

    use App\Http\Controllers\{
        ProfileController,
        UserController,
        RolesController,
        DashboardController,
        FrenchiseController,
        FrontendController,
        LeadsManageCotroller,
        MessageController,
        MasterController,
    };

    use Illuminate\Support\Facades\Route;
    use Maatwebsite\Excel\Row;

    use Illuminate\Support\Facades\Artisan;



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
            // Route::get('cehckout/{say}',[LeadsManageCotroller::class,'with_parameter'])->name('parameter');
            Route::get('get-visa-document', [LeadsManageCotroller::class, 'get_visa_document'])->name('get-visa-document');
            Route::get('delete-visa-document-three', [LeadsManageCotroller::class, 'delete_visa_document'])->name('delete-visa-document-three');
            Route::post('university-course', [LeadsManageCotroller::class, 'university_course'])->name('university.courses');









            //// Master Routes by vinay



            Route::get('rack-master', [MasterController::class, 'rack_master'])->name('rack-master');
            Route::get('rack-master/filter', [MasterController::class, 'rack_master'])->name('rack-master.filter');
            Route::get('rack-master/create', [MasterController::class, 'rack_master_create'])->name('rack-master.create');
            Route::post('rack-master/store', [MasterController::class, 'rack_master_store'])->name('rack-master.store');
            Route::get('rack-master/edit/{id}', [MasterController::class, 'rack_master_edit'])->name('rack-master.edit');
            Route::put('rack-master/update/{id}', [MasterController::class, 'rack_master_update'])->name('rack-master.update');
            Route::get('rack-master/delete/{id}', [MasterController::class, 'rack_master_delete'])->name('rack-master.delete');

            // material master   //
            Route::get('material-master', [MasterController::class, 'index'])->name('material-master.index');
            Route::get('material-master/create', [MasterController::class, 'create'])->name('material-master.create');
            Route::post('material-master', [MasterController::class, 'store'])->name('material-master.store');
            Route::get('material-master/{id}/edit', [MasterController::class, 'edit'])->name('material-master.edit');
            Route::put('material-master/{id}', [MasterController::class, 'update'])->name('material-master.update');
            Route::delete('material-master/{id}', [MasterController::class, 'destroy'])->name('material-master.destroy');


            // work center master
            Route::get('work-center', [MasterController::class, 'work_center'])
                ->name('work-center.index');

            Route::get('work-center/create', [MasterController::class, 'work_center_create'])
                ->name('work-center.create');

            Route::post('work-center/store', [MasterController::class, 'work_center_store'])
                ->name('work-center.store');

            Route::get('work-center/{id}/edit', [MasterController::class, 'work_center_edit'])
                ->name('work-center.edit');

            Route::post('work-center/{id}/update', [MasterController::class, 'work_center_update'])
                ->name('work-center.update');

            Route::delete('work-center/{id}', [MasterController::class, 'work_center_destroy'])
                ->name('work-center.destroy');



           


            // app settings master
            Route::get('app-settings', [MasterController::class, 'app_settings_index'])->name('appsettings.index');
            Route::get('app-settings/create', [MasterController::class, 'app_settings_create'])->name('appsettings.create');
            Route::post('app-settings/store', [MasterController::class, 'app_settings_store'])->name('appsettings.store');
            Route::get('app-settings/{id}/edit', [MasterController::class, 'app_settings_edit'])->name('appsettings.edit');
            Route::put('app-settings/{id}/update', [MasterController::class, 'app_settings_update'])->name('appsettings.update');
            Route::delete('app-settings/{id}/delete', [MasterController::class, 'app_settings_destroy'])->name('appsettings.destroy');




            // Shift master



            Route::get('shift', [MasterController::class, 'shift_index'])->name('shift');
            Route::get('shift-filter', [MasterController::class, 'shift_filter'])->name('shift-filter');

            Route::get('shift/create', [MasterController::class, 'shift_create'])->name('create-shift');
            Route::post('/shift/store', [MasterController::class, 'shift_store'])->name('store-shift');


            Route::get('shift/edit/{id}', [MasterController::class, 'shift_edit'])->name('edit-shift');
            Route::post('shift/update/{id}', [MasterController::class, 'shift_update'])->name('update-shift');

            Route::get('shift/delete/{id}', [MasterController::class, 'shift_destroy'])->name('delete-shift');



            // Material Ctl master
            Route::get('material-ctl', [MasterController::class, 'material_ctl'])->name('material-ctl');
            Route::get('material-ctl-filter', [MasterController::class, 'material_ctl'])->name('material-ctl-filter');
            Route::get('create-material-ctl', [MasterController::class, 'material_ctl_create'])->name('create-material-ctl');
            Route::get('edit-material-ctl/{id?}', [MasterController::class, 'material_ctl_edit'])->name('edit-material-ctl');
            Route::get('delete-material-ctl/{id?}', [MasterController::class, 'material_ctl_delete'])->name('delete-material-ctl');
            Route::post('update-material-ctl/{id?}', [MasterController::class, 'material_ctl_update'])->name('update-material-ctl');
            Route::post('store-material-ctl', [MasterController::class, 'material_ctl_store'])->name('store-material-ctl');
            Route::get('delete-material-ctl/{id?}', [MasterController::class, 'material_ctl_delete'])->name('delete-material-ctl');

            //  customer ctl master

            Route::get('customer-ctl', [MasterController::class, 'customer_ctl'])->name('customer-ctl');
            Route::get('customer-ctl-filter', [MasterController::class, 'customer_ctl'])->name('customer-ctl-filter');
            Route::get('create-customer-ctl', [MasterController::class, 'customer_ctl_create'])->name('create-customer-ctl');
            Route::get('edit-customer-ctl/{id?}', [MasterController::class, 'customer_ctl_edit'])->name('edit-customer-ctl');
            Route::get('delete-customer-ctl/{id?}', [MasterController::class, 'customer_ctl_delete'])->name('delete-customer-ctl');
            Route::post('update-customer-ctl/{id?}', [MasterController::class, 'customer_ctl_update'])->name('update-customer-ctl');
            Route::post('store-customer-ctl', [MasterController::class, 'customer_ctl_store'])->name('store-customer-ctl');
            Route::get('delete-customer-ctl/{id?}', [MasterController::class, 'customer_ctl_delete'])->name('delete-customer-ctl');

          


            Route::get('/fetch-state', [LeadsManageCotroller::class, 'fetchStates'])->name('state.get');
        });
    });
    require __DIR__ . '/auth.php';
