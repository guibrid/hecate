<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

	
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreDocument extends FormRequest
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
            "filename"    => "array",
            "filename.*"  => "required",
            "documents"   => "required",
            "documents.*" => "required|file|mimes:xlsx,xls,jpg,jpeg,png,gif,pdf,doc,docx"

        ];
    }

    protected function prepareForValidation()
    {

        $this->merge(['filename'=> json_decode($this->filename)]);
        $this->merge(['documents'=> $this->file()]);

    }

    public function failedValidation(Validator $validator) { 
        //write your bussiness logic here otherwise it will give same old JSON response
        throw new HttpResponseException(response()->json($validator->errors(), 422));
   }
    
}
