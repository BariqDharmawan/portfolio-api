<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SkillCategoryRequest extends FormRequest
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
            $isUnique = 'unique:skill_category';
        }
        else {
            $isUnique = '';
        }

        return [
            'category' => 'required|alpha_dash|' . $isUnique
        ];
    }

    public function messages()
    {
        return [
            'category.required' => "The :attribute field should not be empty.",
            'category.alpha' => "The :attribute field should be letter without space and number.",
            'category.unique' => "The '$this->category' :attribute field has already been taken."
        ];
    }
}
