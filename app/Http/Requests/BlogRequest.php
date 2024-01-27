<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
            'categorie_id'    => ['required'],
            'tag_ids'         => ['nullable', 'array'],
            'title'           => ['required'],
            'sub_title'       => ['required'],
            'f_discrption'    => ['required'],
            's_discrption'    => ['nullable'],
            't_discrption'    => ['nullable'],
            'l_discrption'    => ['nullable'],
            'socal_media'     => ['required', 'array'],
            'tag'             => ['required'],
            'meta_title'      => ['nullable'],
            'meta_keyword'    => ['nullable'],
            'meta_discrption' => ['nullable'],
            'order_by'        => ['required'],
            'status'          => ['required'],
        ];

        if (request()->update_id) {
            $roles['image'] = ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048', 'dimensions:min_width=557,min_height=373,max_width=557,max_height=373'];
            $roles['f_image'] = ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048', 'dimensions:min_width=557,min_height=373,max_width=557,max_height=373'];
            $roles['l_image'] = ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048', 'dimensions:min_width=557,min_height=373,max_width=557,max_height=373'];
        } else {
            $roles['image'] = ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048', 'dimensions:min_width=557,min_height=373,max_width=557,max_height=373'];
            $roles['f_image'] = ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048', 'dimensions:min_width=557,min_height=373,max_width=557,max_height=373'];
            $roles['l_image'] = ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048', 'dimensions:min_width=557,min_height=373,max_width=557,max_height=373'];
        }

        return $roles;
    }
}
