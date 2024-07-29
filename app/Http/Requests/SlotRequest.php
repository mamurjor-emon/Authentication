<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SlotRequest extends FormRequest
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
            'start_zone' => ['required'],
            'end_zone'   => ['required'],
            'order_by'   => ['required'],
            'status'     => ['required'],
        ];

        if (request()->update_id) {
            $roles['start_time'] = ['required'];
            $roles['end_time']   = ['required'];
        } else {
            $roles['start_time'] = ['required','unique:slot_models,start_time'];
            $roles['end_time']   = ['required','unique:slot_models,end_time'];
        }

        return $roles;
    }
}
