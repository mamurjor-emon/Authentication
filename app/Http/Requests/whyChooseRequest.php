<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class whyChooseRequest extends FormRequest
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
            'title'       => ['required'],
            'f_title'     => ['required'],
            's_title'     => ['required'],
            't_title'     => ['required'],
            'youtube_url' => ['required','active_url'],
            'status'      => ['required'],
        ];

        if (request()->update_id) {
            $roles['image'] = ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048', 'dimensions:min_width=2560,min_height=1200,max_width=2560,max_height=1200'];
        } else {
            $roles['image'] = ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048', 'dimensions:min_width=2560,min_height=1200,max_width=2560,max_height=1200'];
        }

        return $roles;
    }
}
