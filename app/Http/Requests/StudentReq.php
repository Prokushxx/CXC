<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentReq extends FormRequest
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
            'email'=>'unique:students,email_addr',
        ];
    }

    public function messages(){
      return [
        'unique'=>'*This email already exists'
      ];
    }
}
