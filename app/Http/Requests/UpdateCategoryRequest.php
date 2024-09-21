<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
{


    public function rules()
    {
        return [
            'name' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Danh mục không được để trống',
        ];
    }
}
