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
                    'name' => 'bail|required|string|unique:skill|max:50',
                    'category_id' => 'required',
                    'start_from' => 'required|integer|min:' .
                        Carbon::now()->startOfCentury()->year . '|max:' . date('Y'),
                    'user_id' => 'required'
                ];
                break;
            case 'PUT':
                return [
                    'name' => 'required|string|max:50',
                    'category_id' => 'bail|required',
                    'start_from' => 'bail|required|integer|min:' .
                        Carbon::now()->startOfCentury()->year . '|max:' . date('Y'),
                    'user_id' => 'required'
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
            'start_from.min' => 'The start from must be at least year ' . Carbon::now()->startOfCentury()->year,
            'start_from.max' => 'The start from must not exceed than year ' . date('Y'),
        ];
    }
}
