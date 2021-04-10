<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        if ($this->isMethod('POST')) {
            return [
                'name' => 'required',
                'username' => 'required',
                // 'email' => 'required',
                'department' => 'required',
                'role' => 'required',
                // 'navigation_type' => 'navigation_type',
                'password' => 'required'
            ];
        }
        return [];
    }
}
