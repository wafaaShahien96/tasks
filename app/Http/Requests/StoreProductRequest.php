<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            // 'image' => 'required',
            'desc' =>'required',
            'category_id' =>'required',
            'purchasing_price' =>'required',
            'selling_price' =>'required',
            'tag_id'=>'required|array',
            'amount' =>'required',
            'Rate_VAT' =>'required',
            'Total' =>'required',


        ];
    }
}
