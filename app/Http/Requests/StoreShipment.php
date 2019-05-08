<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Carbon\Carbon;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreShipment extends FormRequest
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
            'title' => 'required|string|max:149',
            'number' => 'max:49|string|nullable',
            'document_reception'=> 'date|nullable',
            'custom_control' => 'date|nullable',
            'cutoff' => 'date|nullable',
            'container_number' => 'max:49|string|nullable',
            'comment' => 'max:239|string|nullable'
        ];
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        // Reformat document_reception date
        if ( $this->has('document_reception') && !is_null($this->document_reception) ) {
            $this->merge(['document_reception'=> Carbon::createFromFormat('d/m/Y', $this->document_reception)->format('Y-m-d')]);
        }
        // Reformat custom_control date
        if ( $this->has('custom_control') && !is_null($this->custom_control) ) {
            $this->merge(['custom_control'=> Carbon::createFromFormat('d/m/Y', $this->custom_control)->format('Y-m-d')]);
        }
        // Reformat cutoff date
        if ( $this->has('cutoff') && !is_null($this->cutoff) ) {
            $this->merge(['cutoff'=> Carbon::createFromFormat('d/m/Y', $this->cutoff)->format('Y-m-d')]);
        }
    }

	
    /*protected function failedValidation(Validator $validator) {
        throw new HttpResponseException(response()->back()->withErrors($validator->errors(), 422));
    }*/
}
