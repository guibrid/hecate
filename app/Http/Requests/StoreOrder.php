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
            'weight' => 'numeric|nullable',
            'volume' => 'numeric|nullable',
            'recipient' => 'required|max:149|string',
            'supplier' => 'required|max:149|string',
            'comment' => 'max:239|string|nullable',
            'shipment_id' => 'interger|nullable',
            'status_id' => 'required|integer',
            'customer_id' => 'integer|nullable',
            'customer' => 'required|string'
        ];
        return $rules;
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

    }
}
