<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreListingFormRequest extends FormRequest
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
            'title' => 'required|max:255',
            'body' => 'required|max:2000',
            'price' => 'nullable|numeric',
            'url' => 'nullable|url',
            'province_id' => 'required',
            'category_id' => [
                'required',
                Rule::exists('categories', 'id')->where(function ($query) {
                    $query->where('usable', true);
                })
            ],
            'area_id' => [
                'required',
                Rule::exists('areas', 'id')->where(function ($query) {
                    $query->where('usable', true);
                })
            ]
        ];
    }

    public function messages()
    {
        return [
            'area_id.required' => 'Select a valid city or town.'
        ];
    }
}
