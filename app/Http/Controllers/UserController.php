<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\UserDatatable;
use App\Models\User;
use App\Models\Agent;
use App\Models\Teacher;
use App\Models\DataOperator;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserRequest;
use App\Models\Student;
use Illuminate\Validation\ValidationException;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
class UserController extends Controller
{

    public function __construct()
    {
        view()->share('page_title', 'Admin User List');
        $this->middleware('auth');
        $this->middleware('role_or_permission:admin_user.create', ['only' => ['create', 'store']]);
        $this->middleware('role_or_permission:admin_user.update', ['only' => ['edit', 'update']]);
        $this->middleware('role_or_permission:admin_user.view', ['only' => ['index', 'show']]);
        $this->middleware('role_or_permission:admin_user.delete', ['only' => ['destroy']]);
        $roles = Role::pluck('name','id')->toArray();
        view()->share('roles', $roles);
    }

  public function index(Request $request)
    {
      $user = User::whereNotIn('admin_type',['student'])->orderBy('id', 'desc');
            if($request->status == 'Active'){
                $active_Status = 1;
            }else{
                $active_Status = 0;
            }
            if($request->approvestatus == 'Approve'){
                $approvestatus = 1;
            }else{
                $approvestatus = 0;
            }
        // die;
            $authuser = Auth::user();
            if (!($authuser->hasRole('Administrator'))) {
                $userid = Auth::user()->id;
                $user->where('added_by',$userid);
            }
            if ($request->name) {
                $user->where('name', 'LIKE', '%' . $request->name . '%');
            }
            if ($request->email) {
                $user->where('email', 'LIKE', '%' . $request->email . '%');
            }
            if ($request->roles) {
                $user->where('admin_type', 'LIKE', $request->roles . '%');
            }
            if ($request->status) {
                $user->where('is_active',$active_Status);
            }
            if ($request->approvestatus) {
                $user->where('is_approve', $approvestatus);
            }
            $roles = Role::select('name','id')->get();
            $users = $user->paginate(15);
        return view('user.index')->with(compact('roles','users'));
    }

    public function create()
    {
        $role = Role::pluck('name','id')->toArray();
        $user = Auth::user();
        if (!($user->hasRole('Administrator'))) {
            $role = array_filter($role, function ($name) {
                return !in_array($name, ['Administrator', 'agent']);
            });
        }
        return view('user.create',compact('role'));
    }

    public function storeold(UserRequest $request)
    {
        $input = $request->only('name', 'email', 'status', 'password');
        $checkUserExist = User::where('email', trim($input['email']))->exists();
        if ($checkUserExist) {
            throw ValidationException::withMessages([
                'email' => [__('This Email has already been taken.')],
            ]);
        }
        $input['is_active'] = $request->filled('status') ? 1 : 0;
        $input['password'] = Hash::make($request->password);
        $role =Role::where('id',$request->role)->first();
        $input['admin_type'] = $role->name;
        $input['phone_number'] = $request->phone_number;
        $input['added_by'] = Auth::user()->id;
        $userInserted = DB::table('users')->insert($input);
        if ($userInserted) {
            $user = User::where('email', $input['email'])->first();
            if ($request->filled('role')) {
                $role = Role::find($request->get('role'));
                if ($role) {
                    $user->assignRole([$role->id]);
                }
            }
        }
        return redirect()->route('users.index')->with('success', $user->firstname . ' New User Added Successfully');
    }


    public function store(UserRequest $request)
{
    $input = $request->only('name', 'email', 'status', 'password');
    $checkUserExist = User::where('email', trim($input['email']))->exists();

    if ($checkUserExist) {
        throw ValidationException::withMessages([
            'email' => [__('This Email has already been taken.')],
        ]);
    }

    $input['is_active']    = $request->filled('status') ? 1 : 0;
    $input['password']     = Hash::make($request->password);
    $role                  = Role::find($request->role);
    $input['admin_type']   = $role ? $role->name : null;
    $input['phone_number'] = $request->phone_number;
    $input['added_by']     = Auth::id();

    // Insert user
    $userInserted = DB::table('users')->insert($input);

    if ($userInserted) {
        $user = User::where('email', $input['email'])->first();

        if ($request->filled('role')) {
            if ($request->role == 3) {
                // Assign Agent + User both
                $roles = Role::whereIn('name', ['agent'])->pluck('id')->toArray();
                $user->assignRole($roles);

                // Insert record into agents table
                DB::table('agents')->insert([
                    'user_id'     => $user->id,
                    'name'        => $user->name,
                    'email'       => $user->email,
                    'phone'       => $user->phone_number,
                    'status'      => 1,
                    'created_at'  => now(),
                    'updated_at'  => now(),
                ]);
            } else {
                // Assign only selected role
                $role = Role::find($request->get('role'));
                if ($role) {
                    $user->assignRole([$role->id]);
                }
            }
        }
    }

    return redirect()->route('users.index')->with('success', $user->name . ' New User Added Successfully');
}

    /**
     * Display the user's profile form.
     */
    public function edit($id)
    {
        $users = User::with('roles')->where('id', $id)->first();
        // dd($users);
        return view('user.edit', [
            'users' => $users
        ]);
    }
    /**
     * Update the user's profile information.
     */
    public function updateold(UserRequest $request, $id)
    {
      
        $input = $request->only('name', 'email', 'status');
        if($request->missing('status')){
           
            $input['is_active'] = 1;
        } else {
            $input['is_active'] = 0;
        }
        if ($request->filled('password')) {
            $input['password'] = Hash::make($request->password);
        }
        $input['phone_number'] = $request->phone_number;
        $input['added_by'] = Auth::user()->id;
        $user = User::find($id);
        if($request->filled('role')){
            $role = Role::find($request->get('role'));
            $input['admin_type'] = $role->name;
        }
        if($role->name == 'agent' || $role->name == 'sub_agent'){
            $data=Agent::updateOrCreate([
                'user_id' => $user->id
            ], [
                'legal_first_name' => $request->name ?? '',
                'zip' => $user->zip ?? '',
                'is_active' => $input['is_active'] ?? '',
                'email' => $request->email ?? '',
                'phone' => $request->phone_number ?? '',
                'password' => $user->password ?? '',
            ]);
            $student = Student::where('email', $user->email)->first();
            if($student){
                $student->delete();
            }
        }
        if($role->name == 'student'){
            Student::updateOrCreate([
                'user_id' => $user->id
            ], [
                'first_name' => $user->name ?? '',
                'zip' => $user->zip ?? '',
                'email' => $user->email ?? '',
                'phone_number' => $user->phone ?? '',
            ]);
            $agent = Agent::where('email', $user->email)->first();
            if($agent){
                $agent->delete();
            }
        }
        if($role->name);
        $user->update($input);
        $user->roles()->detach();
        if($request->filled('role')){
            $role = Role::find($request->get('role'));
            if(!empty($role)){
                $user->assignRole([$request->get('role')]);
            }
        }
        return redirect()->route('users.index')->with('success', $user->firstname . ' User Updated Successfully');
        // return redirect()->back()->with('success', $user->firstname.'User Updated Successfully');
    }
  
  
   public function update(UserRequest $request, $id)
    {
        $input = $request->only('name', 'email', 'status');

        // Handle active/inactive status
        $input['is_active'] = $request->status == 1 ? 1 : 0;

      
        // Handle password
        if ($request->filled('password')) {
            $input['password'] = Hash::make($request->password);
        }

        $input['phone_number'] = $request->phone_number;
        $input['added_by'] = Auth::id();

        $user = User::findOrFail($id);

        $role = null;
        if ($request->filled('role')) {
            $role = Role::find($request->get('role'));
            if ($role) {
                $input['admin_type'] = $role->name;
            }
        }

        // Handle Agent/Sub-Agent
        if ($role && ($role->name === 'agent' || $role->name === 'sub_agent')) {
            Agent::updateOrCreate(
                ['user_id' => $user->id],
                [
                    'legal_first_name' => $request->name ?? '',
                    'zip'              => $user->zip ?? '',
                    'is_active'        => $input['is_active'] ?? '',
                    'email'            => $request->email ?? '',
                    'phone'            => $request->phone_number ?? '',
                    'password'         => $user->password ?? '',
                ]
            );

            // Remove student if exists
            if ($student = Student::where('email', $user->email)->first()) {
                $student->delete();
            }
        }

        // Handle Student
        if ($role && $role->name === 'student') {
            Student::updateOrCreate(
                ['user_id' => $user->id],
                [
                    'first_name'   => $user->name ?? '',
                    'zip'          => $user->zip ?? '',
                    'email'        => $user->email ?? '',
                    'phone_number' => $user->phone_number ?? '',
                ]
            );

            // Remove agent if exists
            if ($agent = Agent::where('email', $user->email)->first()) {
                $agent->delete();
            }
        }

        // Update User
        $user->update($input);

        // Sync role
        $user->roles()->detach();
        if ($role) {
            $user->assignRole([$role->id]);
        }

        return redirect()
            ->route('users.index')
            ->with('success', $user->name . ' User Updated Successfully');
    }

    public function show($id)
    {
        $users = User::find($id);
        if (empty($users)) {
            throw ValidationException::withMessages([
                'error' => [__('Admin User is not found')],
            ]);
        }
        return view('user.show', ['users' => $users]);
    }

    /**
     * Delere user by admin
     *
     *
     * */
    public function destroy($id)
    {
        $user = User::find($id);
        if (empty($user)) {
            return redirect()->back()->withErrors('Unable to find user.');
        }
        if ($user->hasRole('Administrator')) {
            return redirect()->back()->withErrors('Administrative users cannot be deleted.');
        }
        $user->delete();
        return redirect()->back()->with('success', 'User Deleted Successfully');
    }

    /**
     * Delete the user's account from profile section.
     */
    public function deleteAccount(Request $request)
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();
        Auth::logout();
        $user->delete();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return Redirect::to('/login');
    }

    public function impersonate(User $user)
    {
        if (Auth::user()->hasRole('Administrator') || Auth::user()->hasRole('Data oprator') || Auth::user()->hasRole('Sub Data-Operator')   || Auth::user()->hasRole('agent') || Auth::user()->hasRole('sub_agent') || Auth::user()->hasRole('visa') || Auth::user()->hasRole('Application Punching')) {
            $adminUser = Auth::user();
            Auth::login($user);
            Session::put('admin_user', $adminUser);
            if ($user->admin_type == 'agent' || $user->admin_type == 'sub_agent') {
                $frenchise = DB::table('agents')->where('email', $user->email)->first();
                if (!empty($frenchise)) {
                    if ($user->admin_type == 'agent' && $frenchise->is_active == 1 && $frenchise->is_approve == 1 && $frenchise->profile_completed == 1) {
                        return redirect()->route('dashboard');
                    } else {
                        return redirect()->route('frenchise-edit', $frenchise->id);
                    }
                }
            }
            return redirect()->route('dashboard');
        }
        return redirect()->back()->with('error', 'You are not authorized to impersonate users.');
    }

    public function revertToAdmin()
    {
        $adminUser = Session::get('admin_user');
        if ($adminUser) {
            Auth::login($adminUser);
            Session::forget('admin_user');
            return redirect()->route('dashboard');
        }
        return redirect()->back()->with('error', 'Admin user information not found.');
    }

    public function updateUserStatus(Request $request)
    {
        $dataOperator = DataOperator::find($request->id);
        $userrole = User::where('id', $dataOperator->user_id ?? $request->id)->first();

        if($userrole->admin_type == 'agent' || $userrole->admin_type == 'sub_agent'){
            DB::table('agents')->where('email', $userrole->email)->update(['is_active' => $request->status]);
        }elseif($userrole->admin_type == 'Data oprator' || $userrole->admin_type == 'Sub Data-Operator'){
           $data= DB::table('data_operators')->where('email', $userrole->email)->update(['status' => $request->status]);
        }
        DB::table('users')->where('id', $dataOperator->user_id ?? $request->id)->update(['is_active' => $request->status]);
        return response()->json(['message' => 'Status updated successfully']);
    }

   public function approveUserStatus(Request $request)
    {
        $Id = $request->userId;
        $userrole =User::where('id',$Id)->first();
        if($userrole->admin_type == 'agent' || $userrole->admin_type == 'sub_agent'){
            DB::table('agents')->where('email', $userrole->email)->update(['is_approve' => $request->selectedValue]);
            User::where('id',$Id)->update(['is_approve' => $request->selectedValue]);
        }
        $daTA=User::where('id', $Id)->update(['is_approve' => $request->selectedValue]);
        // DD($daTA);
        return response()->json(['message' => 'Status updated successfully']);
    }




}
