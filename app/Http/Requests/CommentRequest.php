<?php

namespace App\Http\Requests;

use App\Rules\NoLinks;
use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'comment' => ['required', new NoLinks]
        ];
    }

    public function messages()
    {
        return [
            'comment.required' => 'Comment không thể để trống'
        ];
    }
}
