<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BulldingRequest extends FormRequest
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

            'location' => ['required'],
            'order_by' => ['required'],
            'status'   => ['required'],
        ];
        if (request()->update_id) {
            $roles['name']   = ['required'];
            $roles['image']  = ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048'];
        } else {
            $roles['name']   = ['required', 'unique:bulldings,name,'];
            $roles['image']   = ['required','image', 'mimes:jpeg,png,jpg,gif', 'max:2048'];
        }
        return $roles;
    }
}
