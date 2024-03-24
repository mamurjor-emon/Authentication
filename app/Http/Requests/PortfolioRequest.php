<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PortfolioRequest extends FormRequest
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

        $rulse['category_id']       = ['required'];
        $rulse['client_name']       = ['required'];
        $rulse['date']              = ['required'];
        $rulse['phone']             = ['required'];
        $rulse['age']               = ['required'];
        $rulse['title']             = ['required'];
        $rulse['btn_title']         = ['required'];
        $rulse['btn_url']           = ['required'];
        $rulse['btn_target']        = ['required'];
        $rulse['order_by']          = ['required'];
        $rulse['discription']       = ['required'];
        $rulse['status']            = ['required'];
        $rulse['portfolio_gallery'] = ['required'];
        $rulse['image']             = ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048', 'dimensions:min_width=320,min_height=253,max_width=320,max_height=253'];
        if (request()->update_id) {
            $rulse['portfolio_gallery'][0] = request()->update_id;
            $rulse['image'][0]             = request()->update_id;
        }
        return $rulse;
    }
}
