<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class MaterialRequest extends FormRequest
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
            'wight' => 'required|max:20',
            'code' => 'required|max:20',
        ];
    }

    public function messages()
    {
        return [
            'date.required' => 'Ошибка,поле date пустое',
            'wight.required' => 'Ошибка,поле wight пустое',
            'code.required' => 'Ошибка,поле code пустое',
        ];
    }
}
