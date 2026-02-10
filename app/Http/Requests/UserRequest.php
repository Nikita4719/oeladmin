<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Route;

class UserRequest extends FormRequest
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
            'name' => 'required',
            'role'=>'required',
        ];
        $name = Route::currentRouteName();
        if($name == 'users.store'){
            $rules['password'] = 'required|min:8';
            $rules['email'] = 'required|email|max:255|unique:users,email';
        } else {
            $roleId = $this->route('id');
            $rules['email'] = 'required|email|max:255|unique:users,email,'.$roleId ;
        }
        return $rules;
    }
}
