<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Route;

class RoleRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $route = $this->route();
        $routeName = $route ? $route->getName() : null;

        if($routeName == 'roles-permissions.store'){
            return [
                'name' => 'required|unique:roles,name'
            ];
        } else if($routeName == 'roles-permissions.update') {
            $roleId = $this->route('id');
            return [
                'name' => [
                    'required',
                    Rule::unique('roles', 'name')->ignore($roleId),
                ]
            ];
        }

        return [];
    }
}