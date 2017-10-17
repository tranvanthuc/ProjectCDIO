<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditPassUserRequest extends FormRequest
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
            'oldPass' => 'required|alpha_num|min:8|max:16',
            'newPass' => 'required|alpha_num|min:8|max:16',
            'confirmPass' => 'required|alpha_num|same:newPass|min:8|max:16',
        ];
    }

    public function messages()
    {
        return [
            'oldPass.required' => 'Vui lòng nhập mật khẩu cũ!',
            'oldPass.alpha_num' => 'Mật khẩu chỉ chứa ký tự chữ và số !',
            'oldPass.max' => 'Mật khẩu tối đa có 16 ký tự !',
            'oldPass.min' => 'Mật khẩu ít nhất có 8 ký tự !',

            'newPass.required' => 'Vui lòng nhập mật khẩu mới !',
            'newPass.alpha_num' => 'Mật khẩu chỉ chứa ký tự chữ và số !',
            'newPass.max' => 'Mật khẩu tối đa có 16 ký tự !',
            'newPass.min' => 'Mật khẩu ít nhất có 8 ký tự !',

            'confirmPass.max' => 'Mật khẩu xác nhận tối đa có 16 ký tự !',
            'confirmPass.min' => 'Mật khẩu xác nhận ít nhất có 8 ký tự !',
            'confirmPass.required' => 'Vui lòng nhập mật khẩu xác nhận !',
            'confirmPass.alpha_num' => 'Mật khẩu chỉ chứa ký tự chữ và số !',
            'confirmPass.same' => 'Mật khẩu không trùng khớp !',
        ];
    }
}
