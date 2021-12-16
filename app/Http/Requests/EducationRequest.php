<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class EducationRequest extends FormRequest
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
            'range' => 'required|max:20',
            'date' => 'required|max:20',
            'faculty' => 'required|max:20',
            'speciality' => 'required|max:20',
        ];
    }

    public function messages()
    {
        return [
            'range.required' => 'Ошибка,поле range пустое',
            'date.required' => 'Ошибка,поле date пустое',
            'faculty.required' => 'Ошибка,поле faculty пустое',
            'speciality.required' => 'Ошибка,поле speciality пустое',
        ];
    }
}
