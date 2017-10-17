<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'username' => 'required|alpha_num|exists:users,username|alpha_num|max:16|min:5',
            'password' => 'required|alpha_num|min:8|max:16',
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'Vui lòng nhập tên tài khoản !',
            'username.alpha_num' => 'Tên tài khoản chỉ chứa ký tự chữ và số !',
            'username.exists' => 'Tên tài khoản không tồn tại !',
            'username.max' => 'Tên tài khoản tối đa có 16 ký tự !',
            'username.min' => 'Tên tài khoản ít nhất có 5 ký tự !',
            'password.required' => 'Vui lòng nhập mật khẩu !',
            'password.alpha_num' => 'Mật khẩu chỉ chứa ký tự chữ và số !',
            'password.max' => 'Mật khẩu tối đa có 16 ký tự !',
            'password.min' => 'Mật khẩu ít nhất có 8 ký tự !',  
        ];
    }
}
