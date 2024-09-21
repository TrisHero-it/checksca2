<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAdminAccount extends FormRequest
{


    public function rules()
    {
        return [
            'name' => ['required', 'unique:accounts,name'],
            'fullname' => 'required',
            'password' => 'required|min:6'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tài khoản không được để trống',
            'name.unique' => 'Tài khoản đã tồn tại',
            'fullname.required' => 'Tên không được để trống',
            'password.required' => 'Mật khẩu không được để trống',
            'password.min' => 'Mật khẩu phải lớn hơn 6 kí tự'
        ];
    }
}
