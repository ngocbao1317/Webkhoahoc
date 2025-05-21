<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoaiKhoaHocRequestCreate extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'ten_khoa_hoc'    =>'required|min:4|max:30',
            'slug_khoa_hoc'   =>'required|unique:loai_khoa_hocs,slug_khoa_hoc|min:5|max:45',
            'hinh_anh'         =>'required',
            'mo_ta_ngan'      =>'required|min:100',
            'tinh_trang'      =>'required|boolean',
        ];
    }
    public function messages()
    {
        return [
            'ten_khoa_hoc.required'         =>'Tên khóa học không được để trống',
            'slug_khoa_hoc.required'        =>'Slug khóa học không được để trống',
            'hinh_anh.required'             =>'Hình ảnh không được để trống',
            'tinh_trang.required'           =>  'Tình trạng không được để trống',
            'tinh_trang.boolean'            =>  'Tình trạng phải chọn đúng yêu cầu',
            'ten_khoa_hoc.min'              =>'Tên khóa học ít nhất phải 4 ký tự',
            'ten_khoa_hoc.min'              =>'Tên khóa học ít nhất phải 4 ký tự',
            'slug_khoa_hoc.max'             =>'Slug khóa học nhiều nhất phải 45 ký tự',
            'slug_khoa_hoc.min'             =>'Slug khóa học ít nhất phải 5 ký tự',
            'slug_khoa_hoc.max'             =>'Slug khóa học nhiều nhất phải 45 ký tự',
            'mo_ta_ngan.required'           =>'Mô tả ngắn ít nhất phải 100 ký tự',
            'mo_ta_ngan.min'                =>'Mô tả ngắn ít nhất phải 100 ký tự',
        ];
    }
}
