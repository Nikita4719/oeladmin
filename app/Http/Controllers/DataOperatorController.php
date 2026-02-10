<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    DataOperator,
    Country, Province, User
};
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;


class DataOperatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dataOperator = DataOperator::latest();
        if(Auth::user()->hasRole('Administrator')){
            $data = $dataOperator->where('admin_type','!=','Sub Data-Operator');
        }else{
            $data = $dataOperator->where('added_by',Auth::user()->id);
        }
        if ($request->name) {
            $data->where('name', 'LIKE', '%' . $request->name . '%');
        }
        if ($request->email) {
            $data->where('email', 'LIKE', '%' . $request->email . '%');
        }
        if ($request->phone_number) {
            $data->where('phone_number', 'LIKE', '%' . $request->phone_number . '%');
        }
        if ($request->country_id) {
            $data->where('country', 'LIKE', '%' . $request->country_id . '%');
        }
        if ($request->province_id) {
            $data->where('state', 'LIKE', '%' . $request->province_id . '%');
        }
        if ($request->zip) {
            $data->where('zip', 'LIKE', '%' . $request->zip . '%');
        }
        if ($request->from_date && $request->to_date) {
            $data->whereBetween('created_at', [$request->from_date . ' 00:00:00', $request->to_date . ' 23:59:59']);
        }
        if ($request->status) {
            if($request->status == 'Active'){
                $data->where("status",1);
            }elseif($request->status == 'InActive'){
                $data->where(function ($query) {
                    $query->whereNull('status')
                        ->orWhere('status', 0);
                 });
            }
        }
        $data = $data->paginate(12);
        $countries =Country::where('name','India')->get();
        return view('admin.dataoperator.index',compact('data','countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries =Country::where('name','India')->get();
        return view('admin.dataoperator.create',compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email|unique:data_operators,email|max:255',
            'password' => 'required|string|min:6',
            'phone_number' => 'required',
            'zip' => 'required|string|max:10',
            'address' => 'required|string|max:342',
            'status' => 'required',
        ]);

        $request->except('_token');
        $user =Auth::user();
        if($user->hasRole('Administrator')){
            $input['admin_type'] = 'Data oprator';
        }else{
            $input['admin_type'] = 'Sub Data-Operator';
        }
        $request->merge(['admin_type' => $input['admin_type']]);
        $request->merge(['added_by' => Auth::user()->id]);
        $dataOperator= DataOperator::create($request->all());

        $input['is_active'] = $request->status;
        $input['status'] = $request->status;
        $input['name'] = $request->name;
        $input['password'] = Hash::make($dataOperator->password);
        $input['zip'] = $dataOperator->zip;

        $input['email'] = $request->email;
        $input['phone_number'] = $request->phone;
        $input['added_by'] = Auth::user()->id;
        $userInserted = User::updateOrCreate(
            ['email' => $request->email],
            $input
        );
        if ($userInserted->admin_type) {
            $role = Role::where('name', $userInserted->admin_type)->first();
            if ($role) {
                $userInserted->assignRole([$role->id]);
            }
        }
        $dataOperator->user_id = $userInserted->id;
        $dataOperator->save();
        return redirect()->route('data-operator')->with('success','Data Operator created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dataOperator = DataOperator::findOrFail($id);
        return view('admin.dataoperator.show',compact('dataOperator'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dataOperator = DataOperator::findOrFail($id);
        $countries =Country::where('name','India')->get();
        $state = Province::get();
        return view('admin.dataoperator.edit',compact('dataOperator','countries','state'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dataOperator= DataOperator::find($id);
        $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:25',
            'email' => 'required|email|unique:users,email,'.$dataOperator->user_id.'|unique:data_operators,email,'.$id.'|max:255',
            'zip' => 'required|string|max:25',
            'address' => 'required|string|max:255',
            'status' => 'required|boolean',
        ]);

        $request->except('_token');
        $user =Auth::user();
        if($user->hasRole('Administrator') || $user->email == $dataOperator->email){
            $input['admin_type'] = 'Data oprator';
        }else{
            $input['admin_type'] = 'Sub Data-Operator';
        }
        $request->merge(['admin_type' => $input['admin_type']]);
        $request->merge(['added_by' => Auth::user()->id]);
        $dataOperator->update($request->all());

        $input['is_active'] = $request->status;
        $input['status'] = $request->status;
        $input['name'] = $request->name;
        $input['zip'] = $request->zip;

        $input['email'] = $request->email;

        $input['phone_number'] = $request->phone;
        $input['added_by'] = Auth::user()->id;
        $userInserted = User::updateOrCreate(
            ['email' => $request->email],
            $input
        );
        return redirect()->route('data-operator')->with('success','Data Operator updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dataOperator = DataOperator::find($id);
        if ($dataOperator) {
            $user = User::where('email', $dataOperator->email)->first();
            if($user){
                $user->delete();
            }
            $dataOperator->delete();
            return redirect()->route('data-operator')->with('success','Data Operator deleted successfully');
        }
        return redirect()->route('data-operator')->with('error','Data Operator not found');
    }

}
