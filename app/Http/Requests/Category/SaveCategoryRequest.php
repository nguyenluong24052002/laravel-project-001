<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class SaveCategoryRequest extends FormRequest
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
        return [
            'name' => ['required', 'min:2', 'max:255'],
            'email' => ['required', 'email', 'min:2', 'max:255'],
            'phone' => ['required', 'regex:/^0\d{9}$/'],
            'address' => ['required', 'min:5', 'not_regex:/^[0-9]+$/'],
            'gender' => ['required', 'in:1,2'],
            'member' => ['required', 'numeric', 'min:2'],
            'year' => ['required', 'numeric', 'min:1'],
            'facebook_url' => ['required', 'url', 'starts_with:http://facebook.com/', 'regex:/^http:\/\/facebook\.com\/[a-zA-Z0-9_\-]+$/'],
            'file' => ['required', 'mimes:jpg,png', 'max:10000'],
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Tên',
            'email' => 'Email',
            'phone' => 'Số điện thoại',
            'address' => 'Địa chỉ',
            'gender' => 'Giới tính',
            'member' => 'Member',
            'year' => 'Year',
            'facebook_url' => 'facebook_url',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => ':attribute không được để trống',
            'name.min' => ':attribute phải chứa ít nhất :min kí tự',
            'name.max' => ':attribute không được vượt quá :max kí tự',

            'email.required' => ':attribute không được để trống',
            'email.email' => ':attribute không đúng định dạng email',
            'email.min' => ':attribute phải chứa ít nhất :min kí tự',
            'email.max' => ':attribute không được vượt quá :max kí tự',

            'phone.required' => ':attribute không được để trống',
            'phone.regex' => ':attribute phải bắt đầu bằng số 0 và có 10 kí tự',

            'address.required' => ':attribute không được để trống',
            'address.min' => ':attribute phải chứa ít nhất :min kí tự',
            'address.not_regex' => ':attribute không được chứa kí tự số',

            'gender.required' => ':attribute phải được chọn',
            'gender.in' => ':attribute phải là 1 hoặc 2',

            'member.required' => ':attribute không được để trống',
            'member.numeric' => ':attribute phải là số',
            'member.min' => ':attribute phải có giá trị lớn hơn 1.',

            'year.required' => ':attribute không được để trống',
            'year.min' => ':attribute phải có giá trị lớn hơn hoặc bằng 1.',

            'facebook_url.required' => ':attribute không được để trống',
            'facebook_url.url' => ':attribute phải là một URL hợp lệ.',
            'facebook_url.starts_with' => ':attribute bắt buộc là http://facebook.com/',
            'facebook_url.regex' => ':attribute phải là http://facebook.com/xxxxx.',
        ];
    }
}
