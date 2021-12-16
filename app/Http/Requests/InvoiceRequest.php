<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class InvoiceRequest extends FormRequest
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

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'data' => [
                'success' => false,
                'message' => 'Ошибка валидации',
                'errors' => $validator->errors(),
            ]
        ]));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'date' => 'required|max:20',
            'coast' => 'required|max:20',
            'requests_id' => 'required|max:20',
        ];
    }

    public function messages()
    {
        return [
            'date.required' => 'Ошибка,поле date пустое',
            'coast.required' => 'Ошибка,поле coast пустое',
            'requests_id.required' => 'Ошибка,поле requests_id пустое',
        ];
    }
}
