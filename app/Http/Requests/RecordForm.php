<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecordForm extends FormRequest
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
            'uuid' => 'required',
            'name' => 'required',
            'code' => 'required',            
        ];
    }

    /**
     * Get the message errors
     *
     * @return array
     */
    public function messages()
    {
        return [
            'required' => 'Need to fill this field',
        ];
    }
}
