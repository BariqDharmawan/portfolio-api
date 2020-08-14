<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if ($this->method() == 'POST') {
            return [
                'name' =>  ['required', 'unique:social_media', 'max:50'],
                'url' => ['required', 'string']
            ];
        }
        else {
            return [
                'name' =>  ['required', 'max:50'],
                'url' => ['required', 'string']
            ];
        }
    }
}