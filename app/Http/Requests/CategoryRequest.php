<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{

    public function rules()
    {
        return [
            'name' => ['required', 'unique:categories,name'],
            'image' => ['required']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Danh mục không được để trống',
            'name.unique' => 'Danh mục đã tồn tại',
            'image.required' => 'Ảnh không thể bỏ trống'
        ];
    }
}
