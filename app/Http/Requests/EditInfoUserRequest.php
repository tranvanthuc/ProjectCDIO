<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditInfoUserRequest extends FormRequest
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
            'name' => 'required|regex:/^[\pL\s\-]+$/u|min:2|max:50',
            'email' => 'required|email',
            'phone' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập họ và tên !',
            'email.required' => 'Vui lòng nhập email !',
            'email.email' => 'Email sai cấu trúc, vui lòng nhập lại !',
            'phone.required' => 'Vui lòng nhập số điện thoại !',
            'phone.numeric' => 'Số điện thoại chỉ có ký tự số !',
            'name.required' => 'Vui lòng nhập tên của bạn !',
            'name.regex' => 'Tên của bạn chỉ chứa ký tự chữ  !',
            'name.max' => 'Tên của bạn tối đa có 50 ký tự !',
            'name.min' => 'Tên của bạn ít nhất có 2 ký tự !',
        ];
    }
}
