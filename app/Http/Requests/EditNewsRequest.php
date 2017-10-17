<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditNewsRequest extends FormRequest
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
            'title' => 'required',
            'sltMajors' => 'required',
            'price' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Please enter title news !',
            'sltMajors.required' => 'Please choose major !',
            'price.required' => 'Please enter price',
            'price.numeric' => 'Please enter price is numeric !',
        ];
    }
}