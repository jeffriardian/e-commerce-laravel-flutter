<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class OrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        $rules = [];

        if($this->isMethod('put')) {
            $rules += ['id' => 'required'];
            $rules += ['product_id' => 'required'];
            $rules += ['user_id' => 'required'];
            $rules += ['quantity' => 'required'];
        }
        
        if($this->isMethod('post')) {
            $rules += ['user_id' => 'required'];
            $rules += ['product_id' => 'required'];
            $rules += ['quantity' => 'required'];
        }

        return $rules;
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
