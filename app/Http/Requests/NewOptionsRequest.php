<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Override;

class NewOptionsRequest extends FormRequest
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
            "options" => ["required" , "array" , "min:2"],
            "options.*" => ["required" , "string" ,"min:2", "max:255"]
        ];
    }

    #[Override]
    public function messages()
    {
        return [
            "options.min" => "You have to add at least 2 options ! " ,
            "options.*.required" => "Write something . it can not be empty"
        ];
    }
}
