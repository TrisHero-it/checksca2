<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreComunityRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required',
            'infor' => 'required',
            'link' => ['required', 'url'],
            'image' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên không được để trống',
            'infor.required' => 'Thông tin không được để trống',
            'link.required' => 'Link không được để trống',
            'link.url' => 'Vui lòng điền đúng định dạng',
            'image.required' => 'Ảnh không được để trống',
        ];
    }
}
