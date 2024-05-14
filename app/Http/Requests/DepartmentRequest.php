<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DepartmentRequest extends FormRequest
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
            'icon'        => ['required'],
            'name'        => ['required'],
            'sub_name'    => ['required'],
            'description' => ['required'],
            'order_by'    => ['required'],
            'status'      => ['required'],
        ];

        if (request()->update_id) {
            $roles['image'] = ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048', 'dimensions:min_width=570,min_height=370,max_width=570,max_height=370'];
        } else {
            $roles['image'] = ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048', 'dimensions:min_width=570,min_height=370,max_width=570,max_height=370'];
        }

        return $roles;
    }
}
