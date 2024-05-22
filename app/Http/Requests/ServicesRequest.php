<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServicesRequest extends FormRequest
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
            'icon'              => ['required'],
            'name'              => ['required'],
            'title'             => ['required'],
            'short_description' => ['required'],
            'special_text'      => ['required'],
            'fdescription'      => ['required'],
            'heading'           => ['required'],
            'sdescription'      => ['required'],
            'tdescription'      => ['required'],
            'order_by'          => ['required'],
            'status'            => ['required'],
        ];

        if (request()->update_id) {
            $roles['fimage'] = ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048', 'dimensions:min_width=1920,min_height=1000,max_width=1920,max_height=1000'];
            $roles['simage'] = ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048', 'dimensions:min_width=1920,min_height=1200,max_width=1920,max_height=1200'];
        } else {
            $roles['fimage'] = ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048', 'dimensions:min_width=1920,min_height=1000,max_width=1920,max_height=1000'];
            $roles['simage'] = ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048', 'dimensions:min_width=1920,min_height=1200,max_width=1920,max_height=1200'];
        }

        return $roles;
    }
}
