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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:users',
            'password' => 'required',
            'email' => 'required|email|unique:users,email,',
            'fullname' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên đăng nhập',
            'name.unique' => 'Tên tài khoản đã tồn tại',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'email.required' => 'Vui lòng nhập email',
            'email.unique' => 'Email này đã được đăng kí',
            'email.email' => 'Email không đúng định dạng',
            'fullname.required' => 'Vui lòng nhập tên đầy đủ',
        ];
    }
}
