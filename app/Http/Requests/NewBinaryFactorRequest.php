<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class NewBinaryFactorRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "option" => ["required" , "integer" ,"exists:options,id"],
            "title" => ['required' , 'string' , 'min:3',"max:60"],
            "weight" => ['required','integer', 'min:1' , 'max:5'],
            "score" =>['required' , 'integer' , 'min:1' , "max:10"]
        ];
    }
}
