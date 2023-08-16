<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Đặt thành true nếu bạn muốn cho phép validation
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255|unique:courses',
            'slug' => 'required|string|unique:courses',
            'link' => 'required|url',
            'price' => 'required|numeric|min:0',
            'old_price' => 'required|numeric|min:0',
            'created_by' => 'required|numeric',
            'category_id' => 'required|numeric',
            'lessons' => 'required|numeric',
            'view_count' => 'nullable|numeric|min:0',
            'benefits' => 'nullable',
            'fqa' => 'nullable',
            'is_feature' => 'required|boolean',
            'is_online' => 'required|boolean',
            'description' => 'required|string',
            'content' => 'required|string',
            'meta_title' => 'required|string|max:255',
            'meta_desc' => 'required|string',
            'meta_keyword' => 'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Trường tên là bắt buộc.',
            'name.unique' => 'Tên đã tồn tại.',
            'slug.required' => 'Trường slug là bắt buộc.',
            'slug.unique' => 'Slug đã tồn tại.',
            'link.required' => 'Trường link là bắt buộc.',
            'link.url' => 'Link phải là định dạng URL hợp lệ.',
            'price.required' => 'Trường giá là bắt buộc.',
            'price.numeric' => 'Giá phải là một số.',
            'price.min' => 'Giá phải lớn hơn hoặc bằng :min.',
            'old_price.required' => 'Trường giá cũ là bắt buộc.',
            'old_price.numeric' => 'Giá cũ phải là một số.',
            'old_price.min' => 'Giá cũ phải lớn hơn hoặc bằng :min.',
            'created_by.required' => 'Trường người tạo là bắt buộc.',
            'created_by.numeric' => 'Người tạo phải là một số.',
            'category_id.required' => 'Trường danh mục là bắt buộc.',
            'category_id.numeric' => 'Danh mục phải là một số.',
            'lessons.required' => 'Trường số bài học là bắt buộc.',
            'lessons.numeric' => 'Số bài học phải là một số.',
            'view_count.numeric' => 'View count phải là một số.',
            'view_count.min' => 'View count phải lớn hơn hoặc bằng :min.',
            'benefits.array' => 'Benefits phải là một mảng.',
            'fqa.array' => 'FQA phải là một mảng.',
            'is_feature.required' => 'Trường is feature là bắt buộc.',
            'is_feature.boolean' => 'Trường is feature phải là true hoặc false.',
            'is_online.required' => 'Trường is online là bắt buộc.',
            'is_online.boolean' => 'Trường is online phải là true hoặc false.',
            'description.required' => 'Trường description là bắt buộc.',
            'description.string' => 'Trường description phải là kiểu chuỗi.',
            'content.required' => 'Trường content là bắt buộc.',
            'content.string' => 'Trường content phải là kiểu chuỗi.',
            'meta_title.required' => 'Trường meta title là bắt buộc.',
            'meta_title.string' => 'Trường meta title phải là kiểu chuỗi.',
            'meta_title.max' => 'Meta title không được vượt quá :max ký tự.',
            'meta_desc.required' => 'Trường meta description là bắt buộc.',
            'meta_desc.string' => 'Trường meta description phải là kiểu chuỗi.',
            'meta_keyword.required' => 'Trường meta keyword là bắt buộc.',
            'meta_keyword.string' => 'Trường meta keyword phải là kiểu chuỗi.',

        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'Tên',
            'slug' => 'Slug',
            'link' => 'Liên kết',
            'price' => 'Giá',
            'old_price' => 'Giá cũ',
            'created_by' => 'Người tạo',
            'category_id' => 'Danh mục',
            'lessons' => 'Số bài học',
            'view_count' => 'View Count',
            'benefits' => 'Benefits',
            'fqa' => 'FQA',
            'is_feature' => 'Is Feature',
            'is_online' => 'Is Online',
            'description' => 'Description',
            'content' => 'Content',
            'meta_title' => 'Meta Title',
            'meta_desc' => 'Meta Description',
            'meta_keyword' => 'Meta Keyword',
        ];
    }
}
