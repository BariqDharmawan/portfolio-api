<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\In;

class ContactRequest extends FormRequest
{
    public $listContact;

    /**
     * ContactRequest constructor.
     */
    public function __construct()
    {
        $this->listContact = [
            'instagram','facebook','whatsapp','twitter','linkedin','bitbucket', 'email',
            'snapchat','pinterest','line','telegram','medium','path'
        ];
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'name' => Str::of($this->name)->lower()->singular(),
        ]);
    }

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
                'name' => [
                    'required',
                    'in:'.implode(",", $this->listContact),
                    'unique:contact',
                    'max:50',
                    'alpha_space'
                ],
                'value' => ['required']
            ];
        }
        else {
            return [
                'name' =>  ['required', 'in:'.implode(",", $this->listContact), 'max:50'],
                'value' => ['required']
            ];
        }
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.in' => 'The contact should be one of the following: ' . implode(",", $this->listContact),
            'name.unique' => "You've already add your '$this->name' contact.",
            'name.alpha_space' => 'Contact name should be only letter and space. Ex: Whatsapp Business'
        ];
    }
}
