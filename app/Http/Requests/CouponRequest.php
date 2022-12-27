<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CouponRequest extends FormRequest
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
            'name' => 'required|min:5',
            'code' => 'required|min:5|regex:/([A-Z0-9])+\S/|unique:coupon',
            'times' => 'required|numeric',
            'condition' => 'required',
            'number' => 'required|numeric',
            'date_start' => 'required|date_format:d/m/Y|after:' . Carbon::now('Asia/Ho_Chi_Minh')->format('d/m/Y'),
            'date_end' => 'required|date_format:d/m/Y|after:date_start',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Điền tên giảm giá',
            'name.min' => 'Tên giảm giá phải trên 5 ký tự',

            'code.required' => 'Điền mã giảm giá',
            'code.min' => 'Mã giảm giá phải trên 5 ký tự',
            'code.regex' => 'Mã giảm giá phải viết in hoa và không cách dòng',
            'code.unique' => 'Mã giảm giá đã tồn tại trước đó',

            'condition' => 'Chọn loại giảm giá',

            'times.required' => 'Chọn số lượng',
            'times.numeric' => 'Số lượng phải là số nguyên',

            'date_start.required' => 'Chọn ngày bắt đầu',
            'date_start.after' => 'Ngày bắt đầu phải trước hoặc bằng hiện tại',

            'date_end.required' => 'Chọn ngày kết thúc',
            'date_end.after' => 'Ngày kết thúc phải trước ngày bắt đầu',
        ];
    }
}
