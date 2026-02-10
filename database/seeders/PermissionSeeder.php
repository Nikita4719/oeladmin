<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class PermissionSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    //  php artisan db:seed PermissionSeeder
    public function run()
    {
        try {
            $permissionList = config('permissionlist.permissions');
            $role = Role::firstOrCreate(['name' => 'Administrator']);
            foreach ($permissionList as $permissions) {
                foreach ($permissions as $subPermission) {
                    if(!empty($subPermission)){
                        Permission::firstOrCreate(['name' => $subPermission]);
                    }
                }
            }
            $role->syncPermissions(Permission::all());
            $input = array('name' => 'RIC','email' => 'admin@com', 'status' => 1, 'password' => Hash::make('12345678'),'admin_type' => 'Administrator');
            $findUser = User::where('email', 'admin@com')->first();
            if(empty($findUser)){
                $user = User::firstOrCreate($input);
                $user->assignRole([$role->id]);
            }
        } catch (\Exception $e) {
            \Log::info($e->getMessage());
        }
    }
}

