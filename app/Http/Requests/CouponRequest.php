<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class FormDataRequest extends FormRequest
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
            'code' => 'required|min:5',
            'times' => 'required|numeric',
            'condition' => 'required',
            'number' => 'required|numeric',
            'date_start' => 'required|after:' . Carbon::now('Asia/Ho_Chi_Minh')->format('d/m/Y'),
            'date_end' => 'required|after:date_start',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Điền tên giảm giá',
            'name.min' => 'Tên giảm giá phải trên 5 ký tự',
            'code.required' => 'Điền tên giảm giá'
        ];
    }
}
