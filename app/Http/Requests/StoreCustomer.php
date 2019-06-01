<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomer extends FormRequest
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
            'name' => 'required|string|max:149',
            'address' => 'max:249|string|nullable',
            'cp'=> 'max:49|string|nullable',
            'country' => 'required|max:199|string',
            'city' => 'max:149|string|nullable'
        ];
    }
}
