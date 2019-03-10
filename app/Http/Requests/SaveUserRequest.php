<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveUserRequest extends FormRequest
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
            'name'=> 'required|min:8',
            'email'=>'email|required|unique:users',
            'password'=>'required|min:6',
            'password_confirm'=>'required|same:password',

        ];
    }
    public function messages(){
        return [
            'name.required' => 'Tên không được để trống.',
            'name.min' => 'Tên phải có ít nhất 8 kí tự.',
            'email.required' => 'Email không được để trống.',
            'email.email' => 'Email không đúng định dạng.',
            'email.unique' => 'Email đã được sử dụng.',
            'password.required' => 'Password không được để trống.',
            'password_confirm.required' => 'Password xác nhận không được để trống.',
            'password_confirm.same' => 'Password xác nhận không đúng.',


        ];
    }
}
