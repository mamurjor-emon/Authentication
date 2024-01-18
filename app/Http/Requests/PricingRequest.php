<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PricingRequest extends FormRequest
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
            'icon'        => ['required'],
            'title'       => ['required'],
            'price'       => ['required'],
            'price_label' => ['required'],
            'discrption'  => ['required'],
            'btn_title'   => ['required'],
            'btn_url'     => ['required'],
            'btn_target'  => ['required'],
            'order_by'    => ['required'],
            'status'      => ['required'],
        ];
    }
}
