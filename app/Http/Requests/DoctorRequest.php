<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DoctorRequest extends FormRequest
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
            'user_id'       => ['required'],
            'department_id' => ['required'],
            'phone'         => ['required'],
            'location'      => ['required'],
            'position'      => ['required'],
            'fdegree'       => ['required'],
            'workday'       => ['required'],
            'fbiography'    => ['required'],
            'education'     => ['required'],
            'status'        => ['required'],
        ];
        if (request()->update_id) {
            $roles['image'] = ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048', 'dimensions:min_width=704,min_height=827,max_width=704,max_height=827'];
        } else {
            $roles['image'] = ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048', 'dimensions:min_width=704,min_height=827,max_width=704,max_height=827'];
        }
        return $roles;
    }
}

