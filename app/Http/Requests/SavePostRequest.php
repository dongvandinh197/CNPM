<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SavePostRequest extends FormRequest
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
            'title' => 'required|min:6',
            'slug' => 'required',
            'feature' => 'required|image|max:1999',
            'content' => 'required|min:20'

        ];
    }
    public function messages(){
        return [
            'title.required' => 'Tên không được bỏ trống.',
            'title.min' => 'Tên tối thiểu 6 kí tự.',
            'slug.required' => 'Tên đường dẫn không để trống',   
            'feature.required' => 'Vui lòng chọn ảnh đại diện.',
            'feature.image' => 'Ảnh không đúng định dạng.',
            'feature.max' => 'Kích thước ảnh không quá 2mb',
            'content.required' => 'Nội dung không được bỏ trống.',
            'content.min' => 'Nội dung phải có ít nhất 20 kí tự.'

        ];
    }
}
