<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SaveUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $rules = [
            'name' => ['required'],
            'email' => ['required', 'email', Rule::unique('users')->ignore($this->user)],
            'phone' => ['required', 'numeric'],
            'address' => ['required'],
            'gender' => ['required', 'in:1,2'],
            'avatar' => ['nullable'],
            'family_id' => ['required'],
        ];

        //Khi thêm mới user
        if (empty($this->user)) {
            $rules['password'] = ['required', 'min:6'];
            $rules['password_confirm'] = ['required', 'same:password'];
        }

        //Khi upload user
        if (! empty($this->user)) {
            $rules['password'] = ['nullable', 'min:6'];
            $rules['password_confirm'] = ['nullable', 'same:password'];
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Vui lòng nhập tên.',
            'email.required' => 'Vui lòng nhập email.',
            'email.email' => 'Email không hợp lệ.',
            'email.unique' => 'Xác nhận email đã có.',
            'phone.required' => 'Vui lòng nhập số điện thoại.',
            'phone.numeric' => 'Số điện thoại phải là dạng số.',
            'address.required' => 'Vui lòng nhập địa chỉ.',
            'gender.required' => 'Vui lòng chọn giới tính.',
            'gender.in' => 'Giới tính không hợp lệ.',
            'password.required' => 'Vui lòng nhập mật khẩu.',
            'password.min' => 'Mật khẩu phải chứa ít nhất :min ký tự.',
            'password_confirm.same' => 'Xác nhận mật khẩu không khớp.',
            'password_confirm.required' => 'Vui lòng nhập mật khẩu.',
            'family_id.required' => 'Vui lòng thông tin.',
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'Tên',
            'email' => 'Email',
            'phone' => 'Số điện thoại',
            'address' => 'Địa chỉ',
            'gender' => 'Giới tính',
            'avatar' => 'Ảnh đại diện',
            'family_id' => 'Family_id',
            'password' => 'Mật khẩu',
            'password_confirm' => 'Xác nhận mật khẩu',
        ];
    }
}
