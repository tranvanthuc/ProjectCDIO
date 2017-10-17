<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddNewsRequest extends FormRequest
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
            'price' => 'required|integer',
            'fImage' => 'required|image'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Please enter title news !',
            'sltMajors.required' => 'Please choose major !',
            'price.required' => 'Please enter price',
            'price.integer' => 'Please enter price is numeric !',
            'fImage.required' => 'Please choose image display news !',
            'fImage.image' => 'Please choose type of image are jpg, jpeg, png'
        ];
    }
}