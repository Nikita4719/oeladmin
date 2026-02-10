<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Role;
use App\Http\Requests\RoleRequest;

class RolesController extends Controller
{

    public function __construct()
    {
        view()->share('page_title', 'Roles & Permissions');
        $this->middleware('auth');
       $this->middleware('role_or_permission:role_permissions.create', ['only' => ['create', 'store']]);
       $this->middleware('role_or_permission:role_permissions.update', ['only' => ['edit', 'update']]);
       $this->middleware('role_or_permission:role_permissions.view', ['only' => ['index', 'show']]);
       $this->middleware('role_or_permission:role_permissions.delete', ['only' => ['destroy']]);
    }

    public function index()
    {

        $roles = Role::all();
        return view('role.index', ['roles' => $roles]);
    }

    public function create()
    {
        $permissionList = config('permissionlist.permissions');
        return view('role.create', [
            'permissionList' => $permissionList
        ]);
    }

    public function store(RoleRequest $request)
    {

        $role = Role::create(['name' => $request->get('name')]);
        if($request->filled('permissions')){
            $permissions = array_keys(array_filter($request->get('permissions'), function ($value) {
                return ($value == 'on');
            }));
            $role->syncPermissions($permissions);
        }
        return redirect('admin-management/roles-permissions')->with('success', 'New Role Created Successfully');
    }

    /**
     * Display the user's profile form.
     */
    public function edit($id)
    {
        $permissionList = config('permissionlist.permissions');
        $role = Role::find($id);
        $selectedPermissions = $role->permissions->pluck('name')->toArray();
        return view('role.edit', [
            'role' => $role,
            'permissionList' => $permissionList,
            'selectedPermissions' => $selectedPermissions
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(RoleRequest $request, $id)
    {
        $role = Role::find($id);
        if(empty($role)){
            return redirect()->back()->with('error', 'Selected  Role is not found.');
        }
        if(strtolower($role->name) == 'administrator'){
            return redirect()->back()->with('error', 'You cannot edit the default Role, As this is the main Role to create and assign permissions to others.');
        }
        $role->update(['name' => $request->name]);
        $role->permissions()->detach();
        if($request->filled('permissions')){
            $permissions = array_keys(array_filter($request->get('permissions'), function ($value) {
                return ($value == 'on');
            }));
            $role->syncPermissions($permissions);
        }
        return redirect()->back()->with('success', $role->name.' Role updated successfully');
    }

    /**
     * Delete the user's account.
     */
    public function destroy($id)
    {
        $role = Role::find($id);
        $name = $role->name;
        if (!empty($role)) {
            $role->permissions()->detach();
            $role->delete();
            return redirect()->back()->with('success', $role->name.' Role Deleted Successfully');
        }
        return redirect()->back()->with('success', $role->name.' Unable to find selected role.');
    }
}
