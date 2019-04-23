<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Helpers;

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
        return [
            'customer' => 'required|string',
            'number' => 'max:49|string|nullable',
            'title' => 'max:149',
            'batch' => 'max:49|string|nullable',
            'load' => 'max:49|string|nullable',
            'package_number' => 'integer|nullable',
            'weight' => 'numeric|nullable',
            'volume' => 'numeric|nullable',
            'recipient' => 'max:149|string|nullable',
            'supplier' => 'max:149|string|nullable',
            'comment' => 'max:239|string|nullable',
            'shipment_id' => 'interger|nullable',
            'status_id' => 'required|integer',
            'customer_id' => 'required|integer',
            
        ];
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
