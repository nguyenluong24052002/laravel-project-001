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
        $rules = [
            'name' => ['required', 'min:2', 'max:255'],
            'email' => ['required', 'email', 'min:2', 'max:255'],
            'phone' => ['required', 'regex:/^0\d{9}$/'],
            'address' => ['required', 'min:5', 'not_regex:/^[0-9]+$/'],
            'gender' => ['required', 'in:1,2'],
            'file' => ['required', 'mimes:jpg,png', 'max:10000'],
        ];

        // Kiểm tra nếu người dùng chọn "Cần Thơ" (location = 4), loại bỏ các quy tắc validate cho các trường liên quan
        if ($this->input('location') == 4) {
            unset($rules['member']);
            unset($rules['year']);
            unset($rules['facebook_url']);
        } else {
            // Nếu người dùng không chọn "Cần Thơ", thêm các quy tắc validate cho các trường liên quan
            $rules['member'] = ['required', 'numeric', 'min:2'];
            $rules['year'] = ['required', 'numeric', 'min:1'];
            $rules['facebook_url'] = ['required', 'url', 'starts_with:http://facebook.com/', 'regex:/^http:\/\/facebook\.com\/[a-zA-Z0-9_\-]+$/'];
        }

        return $rules;
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
            'facebook_url' => 'Facebook URL',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute không được để trống',
            'min' => ':attribute phải chứa ít nhất :min kí tự',
            'max' => ':attribute không được vượt quá :max kí tự',
            'email' => ':attribute không đúng định dạng email',
            'regex' => ':attribute không hợp lệ',
            'in' => ':attribute phải là 1 hoặc 2',
            'numeric' => ':attribute phải là số',
            'phone.regex' => ':attribute phải bắt đầu bằng số 0 và có 10 kí tự',
            'address.not_regex' => ':attribute không được chứa kí tự số',
            'year.min' => ':attribute phải có giá trị lớn hơn hoặc bằng 1.',
            'facebook_url.url' => ':attribute phải là một URL hợp lệ.',
            'facebook_url.regex' => ':attribute phải là http://facebook.com/xxxxx.',
        ];
    }
}
