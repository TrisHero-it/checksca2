<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBankRequest extends FormRequest
{

    public function rules()
    {
        return [
            'name'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required'=> 'Tên ngân hàng không được để trống'
        ] ;
    }
}
