<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class RequestRequest extends FormRequest
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
            'decs' => 'required|max:20',
            'autos_id' => 'required|max:20',
            'employees_id' => 'required|max:20',
        ];
    }

    public function messages()
    {
        return [
            'decs.required' => 'Ошибка,поле decs пустое',
            'autos_id.required' => 'Ошибка,поле autos_id пустое',
            'employees_id.required' => 'Ошибка,поле employees_id пустое',
        ];
    }

}
