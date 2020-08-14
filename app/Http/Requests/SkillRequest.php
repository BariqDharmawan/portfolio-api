<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class SkillRequest extends FormRequest
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
        switch ($this->method()) {
            case 'POST':
                return [
                    'name' => 'required|alpha_space|unique:my_skill|max:50',
                    'category' => 'required|in:frontend-framework,backend-framework,basic-stack,tools,preprocessor',
                    'start_from' => 'required|integer|min:2000|max:2155'
                ];
                break;
            case 'PUT':
                return [
                    'name' => 'required|alpha_space|max:50',
                    'category' => 'required|in:frontend-framework,backend-framework,basic-stack,tools,preprocessor',
                    'start_from' => 'required|integer|min:2000|max:2155'
                ];
            break;
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
            'start_from.min' => 'Start_from field should be minimum 2000 masehi',
        ];
    }
}