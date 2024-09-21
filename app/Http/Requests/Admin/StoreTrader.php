<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreTrader extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'fullname' => 'required',
            'zalo' => 'required',
            'category_id' => 'required',
            'contract_id' => 'required',
            'img'=> 'required',
            'email' => 'required',
            'password' => 'required',
        ];
    }

    public function messages()
    {
        return [
          'fullname.required' => 'Họ tên không được để trống',
          'zalo.required' => 'Số điện thoại không được để trống',
            'category_id.required' => 'Danh mục không được để trống',
            'contract_id.required' => 'Hợp đồng không được để trống',
            'email.required' => 'Email không được để trống',
            'password.required' => 'Mật khẩu không được để trống',
            'img.required' => 'Ảnh không được để trống'
        ];
    }
}
