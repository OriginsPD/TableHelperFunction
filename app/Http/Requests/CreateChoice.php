<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateChoice extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'students_id' => 'required',
            'subjects_id' => 'required',
            'year_of_exam' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'students_id.required' => 'The Student name is required',
            'subjects_id.required' => 'The Subject choices is required',
            'year_of_exam.required' => 'Year of exam is required',
        ];
    }
}
