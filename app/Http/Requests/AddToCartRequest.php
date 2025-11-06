<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddToCartRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'product_id' => 'required|integer',
            'name' => 'required|string',
            'price' => 'required|numeric',
            'quantity' => 'required|integer|min:1',
            'image' => 'nullable|string',


        ];

    }
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $product = \App\Models\ProductModel::find($this->product_id);
            if (!$product || $product->amount < $this->quantity) {
                $validator->errors()->add('quantity', 'Not enough stock available.');
            }
        });
    }
}
