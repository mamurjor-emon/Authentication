<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CallToActionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
        'title'        => ['required'],
        'sub_title'    => ['required'],
        'f_btn_title'  => ['required'],
        'f_btn_url'    => ['required'],
        'f_btn_target' => ['required'],
        'l_btn_title'  => ['required'],
        'l_btn_url'    => ['required'],
        'l_btn_target' => ['required'],
        'status'       => ['required'],
        ];
    }
}
