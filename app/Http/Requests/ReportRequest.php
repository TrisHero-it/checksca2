<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReportRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'danhmuc' => 'required',
            'nganhang' => 'required',
            'image' => 'required',
            'hovaten' => 'required',
            'sotaikhoan' => 'required',
            'scam' => 'required|integer|min:300000',
            'sodienthoai' => ['required', 'regex:/^(\+?\d{1,3})?[-.\s]?(\d{10,12})$/'],
            'noidung' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'hovaten.required' => 'Họ và tên không được để trống',
            'noidung.required' => 'Nội dung không được để trống',
            'image.required' => 'Ảnh không được để trống',
            'uid.required' => 'UID không được để trống',
            'sotaikhoan.required' => 'Vui lòng điền số tài khoản',
            'nganhang.required' => 'Ngân hàng không được để trống',
            'scam.required' => 'Số tiền scam không được để trống',
            'scam.min' => 'Số tiền scam phải lớn hơn 300k',
            'sodienthoai.required' => 'Số điện thoại không được để trống',
            'sodienthoai.regex' => 'Số điện thoại không hợp lệ'
        ];
    }
}
