<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditUserRequest extends FormRequest
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
            'password' => 'required|alpha_num|min:8|max:16',
            'confirmPassword' => 'required|alpha_num|same:password|min:8|max:16',
            'name' => 'required|regex:/^[\pL\s\-]+$/u|min:2|max:50',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'sltLevel' => 'required'
        ];
    }

    public function messages()
    {
        return [
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
            'phone.required' => 'Vui lòng nhập số điện thoại !',
            'phone.numeric' => 'Số điện thoại chỉ có ký tự số !',
            'name.required' => 'Vui lòng nhập tên của bạn !',
            'name.regex' => 'Tên của bạn chỉ chứa ký tự chữ  !',
            'name.max' => 'Tên của bạn tối đa có 50 ký tự !',
            'name.min' => 'Tên của bạn ít nhất có 2 ký tự !',
            'sltLevel.required' => 'Vui lòng chọn level !',
        ];
    }
}
