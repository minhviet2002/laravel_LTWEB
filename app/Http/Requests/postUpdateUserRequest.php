<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;
class postUpdateUserRequest extends FormRequest
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
        $id = DB::select('select id from source.users where name = ? ' , [session('name')]);
        return [
            'name' => 'required|unique:users,name,'.$id[0]->id,
            'email' => 'required|email|unique:users,email,'.$id[0]->id,
            'fullname' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên đăng nhập',
            'name.unique' => 'Tên tài khoản đã tồn tại',
            'email.required' => 'Vui lòng nhập email',
            'email.unique' => 'Email này đã được đăng kí',
            'email.email' => 'Email không đúng định dạng',
            'fullname.required' => 'Vui lòng nhập tên đầy đủ',
        ];
    }
}
