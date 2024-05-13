<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
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
            'user_id' => ['required','unique:reviews,user_id'],
            'review'  => ['required'],
            'status'  => ['required'],
        ];
        if (request()->update_id) {
            $roles['user_id'] =  ['nullable'];
        }

        return $roles;
    }
}
