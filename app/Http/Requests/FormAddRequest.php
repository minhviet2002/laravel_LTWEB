<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormAddRequest extends FormRequest
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
            'lessonname' => 'required',
            'lessonlink' => 'required',
            'title' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Vui lòng nhập tiêu đề',
            'lessonname.required' => 'Vui lòng nhập tên bài học',
            'lessonlink.required' => 'Vui lòng nhập liên kết',
        ];
    }
}
