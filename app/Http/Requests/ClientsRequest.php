<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientsRequest extends FormRequest
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

        $roles = [
            'name'     => ['required'],
            'order_by' => ['required'],
            'status'   => ['required'],
        ];
        if (request()->update_id) {
            $roles['image'] = ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048', 'dimensions:min_width=173,min_height=67,max_width=356,max_height=140'];
        } else {
            $roles['image'] = ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048', 'dimensions:min_width=173,min_height=67,max_width=356,max_height=140'];
        }

        return $roles;
    }
}
