<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Helpers;
use Illuminate\Http\Request;

class StoreOrder extends FormRequest
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

        $rules = [
            'number' => 'required|max:49|string',
            'title' => 'max:149',
            'batch' => 'max:49|string|nullable',
            'load' => 'max:49|string|nullable',
            'package_number' => 'integer|nullable',
            'order_number' => 'max:149|string|nullable',
            'weight' => 'numeric|nullable',
            'volume' => 'numeric|nullable',
            'value' => 'numeric|nullable',
            'bl_number' => 'max:149|string|nullable',
            'delivery' => 'date|nullable',
            'recipient' => 'required|max:149|string',
            'supplier' => 'required|max:149|string',
            'comment' => 'max:239|string|nullable',
            'shipment_id' => 'interger|nullable',
            'status_id' => 'required|integer',
            'customer_id' => 'required|integer|exists:customers,id',
            'customer' => 'required|string|exists:customers,name'
        ];
        return $rules;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function messages()
    {
        $messages = [
            'customer_id.required' => 'Customer is a required field.',
            'customer_id.integer' => 'Customer name not valide.',
            'customer_id.exist' => 'Customer name unknown.',

        ];

        return $messages;
    }
    

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        
        if ($this->has('weight') && !is_null($this->weight)) {
            $this->merge(['weight'=>Helpers::getFloat($this->weight)]);
        }

        if ($this->has('volume') && !is_null($this->volume)) {
            $this->merge(['volume'=>Helpers::getFloat($this->volume)]);
        }

        if ($this->has('value') && !is_null($this->value)) {
            $this->merge(['value'=>Helpers::getFloat($this->value)]);
        }

    }
}
