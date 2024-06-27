<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class NoteRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "category" => ['required', 'integer'],
            "summary" => ['required', 'string'],
            "details" => ['required', 'string'],
            "error_messages" => ['nullable', 'string'],
            "solution" => ['required', 'string'],
            "error_image" => ['nullable', 'string']
        ];
    }

    public function messages()
    {
        return [
            "category.required" => 'category cannot be empty',
            "category.integer" => 'category cannot be empty',
            "summary.required" => 'summary cannot be empty',
            "details.required" => 'details cannot be empty',
            "error_messages.string" => 'error_messages cannot be empty',
            "solution.required" => 'solution cannot be empty',
        ];
    }

    public function failedValidation(Validator $validator){
        throw new HttpResponseException(response([
            "errors" => $validator->getMessageBag()
        ], 400));
    }
}
