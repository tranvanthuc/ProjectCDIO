<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'username' => 'required|unique:users,username|alpha_num|max:16|min:5',
            'password' => 'required|alpha_num|min:8|max:16',
            'confirmPassword' => 'required|alpha_num|same:password|min:8|max:16',
            'name' => 'required|regex:/^[\pL\s\-]+$/u|min:2|max:50',
            'email' => 'required|email|unique:users,email'
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'Vui lòng nhập tên tài khoản !',
            'username.alpha_num' => 'Tên tài khoản chỉ chứa ký tự chữ và số !',
            'username.unique' => 'Tên tài khoản đã tồn tại !',
            'username.max' => 'Tên tài khoản tối đa có 16 ký tự !',
            'username.min' => 'Tên tài khoản ít nhất có 5 ký tự !',
            'password.required' => 'Vui lòng nhập mật khẩu !',
            'password.alpha_num' => 'Mật khẩu chỉ chứa ký tự chữ và số !',
            'password.max' => 'Mật khẩu tối đa có 16 ký tự !',
            'password.min' => 'Mật khẩu ít nhất có 8 ký tự !',
            'confirmPassword.max' => 'Mật khẩu xác nhận tối đa có 16 ký tự !',
            'confirmPassword.min' => 'Mật khẩu xác nhận ít nhất có 8 ký tự !',
            'confirmPassword.required' => 'Vui lòng nhập mật khẩu xác nhận !',
            'confirmPassword.alpha_num' => 'Mật khẩu chỉ chứa ký tự chữ và số !',
            'confirmPassword.same' => 'Mật khẩu và mật khẩu xác nhận không trùng khớp !',
            'name.required' => 'Vui lòng nhập họ và tên !',
            'email.required' => 'Vui lòng nhập email !',
            'email.email' => 'Email sai cấu trúc, vui lòng nhập lại !',
            'email.unique' => 'Email đã tồn tại !',
            'name.required' => 'Vui lòng nhập tên của bạn !',
            'name.regex' => 'Tên của bạn chỉ chứa ký tự chữ  !',
            'name.max' => 'Tên của bạn tối đa có 50 ký tự !',
            'name.min' => 'Tên của bạn ít nhất có 2 ký tự !',
        ];
    }
}
