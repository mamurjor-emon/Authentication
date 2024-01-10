<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SilderRequest extends FormRequest
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
        $rulse = [];

        $rulse['f_title']        = ['required'];
        $rulse['f_spcial_title'] = ['required'];
        $rulse['l_title']        = ['required'];
        $rulse['l_spcial_title'] = ['required'];
        $rulse['description']    = ['required'];
        $rulse['f_btn_title']    = ['required'];
        $rulse['f_btn_url']      = ['required'];
        $rulse['f_btn_target']   = ['required'];
        $rulse['l_btn_title']    = ['required'];
        $rulse['l_btn_url']      = ['required'];
        $rulse['l_btn_target']   = ['required'];
        $rulse['image']          = ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048', 'dimensions:min_width=1600,min_height=830,max_width=1600,max_height=830'];
        $rulse['order_by']       = ['required'];
        $rulse['status']         = ['required'];

        if(request()->update_id){
            $rulse['image'][0] = request()->update_id;
        }
        return $rulse;
    }
}
