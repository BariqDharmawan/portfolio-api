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
        return [
            'name' => 'required|unique:my_skill|max:50',
            'category' => 'required|regex:/^[\pL\s\-]+$/u|max:40',
            'start_from' => 'required|digits:4|integer|min:1900|max:' . Carbon::tomorrow()->year
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'A name of skill is required',
            'category.required' => 'A category of skill is required',
            'start_from.required' => 'A start from of skill is required',
        ];
    }
}
