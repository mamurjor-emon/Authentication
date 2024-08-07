<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TimeTableRequest extends FormRequest
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
            'order_by'   => ['required'],
            'status'     => ['required'],
        ];

        if (request()->update_id) {
            $roles['time'] = ['required'];
        } else {
            $roles['time'] = ['required','unique:time_tables,time'];
        }

        return $roles;
    }
}
