<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'con_title'               => ['required'],
            'con_sub_title'           => ['required'],
            'con_map_url'             => ['required'],
            'con_phone_number'        => ['required'],
            'con_email'               => ['required'],
            'con_address'             => ['required'],
            'con_address_two'         => ['required'],
            'con_open_day'            => ['required'],
            'con_weekend_day'         => ['required'],
            'con_terms_and_condition' => ['required'],
        ];
    }
}
