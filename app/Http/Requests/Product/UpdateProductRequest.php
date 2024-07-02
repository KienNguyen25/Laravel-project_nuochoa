<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'name' => ['required','string','max: 255', "unique:products,name, $this->id"],
            'image' => 'mimes:jpg,png,jpeg,gif,svg|max:204',
            'category_id'=> 'required|numeric',
            'brand_id' => 'required|numeric',
            'quantity' => 'required|numeric',
            'input_price'=> 'required|numeric',
            'output_price'=> 'required|numeric',
            'status' => 'required'
        ];
    }

    public function attributes()
    {
        return [
            'quantity' => 'số lượng',
            'input_price' => 'giá nhập vào',
            'output_price' => 'giá bán ra',
            'brand_id' => 'nhãn hiệu',
            'category_id' => 'danh mục'
        ];
    }
}
