<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
{
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
            'name' => 'required|max:30',
            'address' => 'required'
        ];
    }
    public function messages()
    {
        return [
            '*.required' => ':attribute không được để trống',
        ];
    }
    public function attributes()
    {
        return [
            'address' => 'Địa chỉ',
            'name' => 'Tên',
        ];
    }
}
