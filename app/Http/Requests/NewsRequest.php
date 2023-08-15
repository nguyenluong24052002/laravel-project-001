<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'start_at' => 'required|date',
            'end_at' => 'required|date|after:start_at',
            'is_suspended' => 'required|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Trường tên là bắt buộc.',
            'name.max' => 'Trường tên không được vượt quá :max ký tự.',
            'start_at.required' => 'Trường ngày bắt đầu là bắt buộc.',
            'start_at.date' => 'Trường ngày bắt đầu phải là một ngày hợp lệ.',
            'end_at.required' => 'Trường ngày kết thúc là bắt buộc.',
            'end_at.date' => 'Trường ngày kết thúc phải là một ngày hợp lệ.',
            'end_at.after' => 'Trường ngày kết thúc phải sau ngày bắt đầu.',
            'is_suspended.required' => 'Trường trạng thái đình chỉ là bắt buộc.',
            'is_suspended.boolean' => 'Trường trạng thái đình chỉ phải là true hoặc false.',
        ];
    }
}
