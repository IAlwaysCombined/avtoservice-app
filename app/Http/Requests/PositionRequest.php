<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class PositionRequest extends FormRequest
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
            'name' => 'required|max:20',
            'salary' => 'required|max:20',
            'role' => 'required|max:20',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Ошибка,поле name пустое',
            'salary.required' => 'Ошибка,поле salary пустое',
            'role.required' => 'Ошибка,поле role пустое',
        ];
    }

}
