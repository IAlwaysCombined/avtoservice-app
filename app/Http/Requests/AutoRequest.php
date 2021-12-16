<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class AutoRequest extends FormRequest
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
            'vin' => 'required|max:20',
            'model' => 'required|max:20',
            'brand' => 'required|max:20',
            'color' => 'required|max:20',
            'eco' => 'required|max:20',
            'user_id' => 'required|max:150',

        ];
    }

    public function messages()
    {
        return [
            'vin.required' => 'Ошибка,поле vin пустое',
            'model.required' => 'Ошибка,поле model пустое',
            'brand.required' => 'Ошибка,поле brand пустое',
            'color.required' => 'Ошибка,поле color пустое',
            'eco.required' => 'Ошибка,поле eco пустое',
            'user_id.required' => 'Ошибка,поле user_id пустое',
        ];
    }

}
