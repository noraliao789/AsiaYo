<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CurrencyExchangeRequest extends FormRequest
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
            'source' => 'required|string',
            'target' => 'required|string',
            'amount' => 'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'source.required' => 'A title is required',
            'body.required' => 'A message is required',
        ];
    }
}
