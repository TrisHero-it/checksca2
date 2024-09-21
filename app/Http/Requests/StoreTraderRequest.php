<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTraderRequest extends FormRequest
{
    public function rules()
    {
        return [
            'fullname' => ['required'],
            'zalo' => ['required', 'regex:/^[0-9]{10}$/'],
            'img' => ['required'],
            'category_id' => ['required'],
            'identity' => ['required'],
            'uid' => ['required'],
        ];
    }

    public function messages()
    {

        return [
            'fullname.required' => 'Tên không được để trống',
            'zalo.required' => 'số điện thoại không được để trống',
            'img.required' => 'Ảnh không được để trống',
            'category_id.required' => 'Danh mục không được để trống',
            'zalo.regex' => 'Vui lòng nhập đúng định dạng',
            'identity'=> 'Ảnh căn cước không được để trống',
            'uid' => 'Mục này không được để trống'

        ];
    }
}
