<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDetailContractRequest extends FormRequest
{

    public function rules()
    {
        return [
            'category_id' => 'required',
            'name' => 'required',
            'moneys' => 'required|numeric|min:50000',
            'email_buyer' => 'required|email',
            'name_buyer' => 'required',
            'email_seller' => 'required|email',
            'name_seller' => 'required',
            'g-recaptcha-response' => 'required|captcha',
        ];
    }
}
