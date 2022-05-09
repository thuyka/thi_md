<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStaffRequest extends FormRequest
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
            'id'      => 'required',
            'group'   => 'required',
            'name'    => 'required',
            'gender'   => 'required',
            'date_of_birth' => 'required',
            'card'    => 'required',
            'email'   => 'required',
            'address' => 'required',
            'phone'   => 'required',
        ];
    }
    public function messages()
    {
        return [
            'id.required'      => 'Vui lòng nhập id',
            'group.required'   => 'Vui lòng nhập nhóm',
            'name.required'    => 'Vui lòng nhập tên',
            'gender.required'    => 'Vui lòng nhập giới tính',
            'date_of_birth.required' => 'Vui lòng nhập ngày sinh',
            'card.required'    => 'Vui lòng nhập chứng minh',
            'email.required'   => 'Vui lòng nhập email',
            'address.required' => 'Vui lòng nhập địa chỉ',
            'phone.required'   => 'Vui lòng nhập số điện thoại',
        ];
    }
}
