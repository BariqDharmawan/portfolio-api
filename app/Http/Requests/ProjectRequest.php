<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
            'title' => 'required|alpha_space|unique:project|max:50',
            'finished_date' => 'required|date|before_or_equal:today|after:2000-01-01',
            'is_teamwork' => 'required|boolean',
            'desc' => 'required|string|min:10|max:255'
        ];
    }
}
