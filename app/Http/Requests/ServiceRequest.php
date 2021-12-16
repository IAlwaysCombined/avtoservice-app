<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ServiceRequest extends FormRequest
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
            'coast' => 'required|max:20',
            'time' => 'required|max:20',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Ошибка,поле name пустое',
            'coast.required' => 'Ошибка,поле coast пустое',
            'time.required' => 'Ошибка,поле time пустое',
        ];
    }
}
