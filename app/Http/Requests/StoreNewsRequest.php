<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNewsRequest extends FormRequest
{

    public function rules()
    {
        return [
            'title' => 'required',
            'image'=> 'required',
            'content'=> 'required'
        ];
    }
}
