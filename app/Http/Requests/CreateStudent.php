<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateStudent extends FormRequest
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
            'first_nm' => 'required|max:25',
            'last_nm' => 'required',
            'dob' => 'required',
            'class' => 'required',
            'phone_nbr' => 'required|numeric',
            'email_addr' => 'required|email',
            'gender' => 'required',
        ];
    }
}
