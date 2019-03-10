<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveCategoryRequest extends FormRequest
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
            'name'=>'required|min:6|max:30',
            // 'slug'=>'required'
        ];
    }
    public function messages(){
        return [
            'name.required' => 'Bạn phải nhập nhập tên danh mục',
            // 'slug.required' => 'Bạn phải nhập đường dẫn',
            'name.min' => 'Danh mục tối thiểu 6 kí tự',
            'name.max' => 'Danh mục tối đa  30 kí tự',
        ];
    }
}
