<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SocalMediaRequest extends FormRequest
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
            'icon'     => ['required'],
            'name'     => ['required'],
            'url'      => ['required'],
            'target'   => ['required'],
            'order_by' => ['required'],
            'status'   => ['required']
        ];
    }
}
