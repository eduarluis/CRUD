<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CrudRequest extends FormRequest
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
            'max32' => 'required|max:32|min:1',
            'max65535' => 'required|max:65535|min:1',
        ];
    }

    public function messages()
    {
        return [
            'max32.required' => 'The field is required and must have a maximum of 32 characters',
            'max65535.required' => 'The field is required and must have a maximum of 65535 characters',
        ];
    }
}
