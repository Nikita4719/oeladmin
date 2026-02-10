<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Route;

class HouseTeamRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request)
    {
        $rules = [
            'firstname' => 'required',
            'lastname' => 'required',
            'house_id' => 'required'
        ];

        $name = Route::currentRouteName();
        if($name == 'houseteam.store'){
            $rules['password'] = 'required|regex:/^(?=.*?[A-Za-z])(?=.*?[0-9])(?=.*[$!@#$%^_&*!?)(,]{1,}).{8,}$/|min:8';
            $rules['email'] = 'required|email|max:255|unique:users,email';
        } else {
            $rules['email'] = 'required|email|max:255|unique:users,email,' . $request->route('user');
        }
        return $rules;
    }
}