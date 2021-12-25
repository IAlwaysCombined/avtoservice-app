<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class EmployeeRequest extends FormRequest
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
            'email' => 'required|max:20',
            'phone' => 'required|max:20',
            'name' => 'required|max:20',
            'surname' => 'required|max:20',
            'pass' => 'required|max:150',
            'passport_series' => 'required|max:150',
            'passport_number' => 'required|max:150',
            'depart' => 'required|max:150',
            'depart_code' => 'required|max:150',
            'positions_id' => 'required|max:150',
            'education_id' => 'required|max:150',
            'solutions_id' => 'required|max:150',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Ошибка,поле email пустое',
            'phone.required' => 'Ошибка,поле phone пустое',
            'name.required' => 'Ошибка,поле name пустое',
            'surname.required' => 'Ошибка,поле surname пустое',
            'pass.required' => 'Ошибка,поле pass пустое',
            'passport_series.required' => 'Ошибка,поле passport_series пустое',
            'passport_number.required' => 'Ошибка,поле passport_number пустое',
            'depart.required' => 'Ошибка,поле depart пустое',
            'depart_code.required' => 'Ошибка,поле depart_code пустое',
            'positions_id.required' => 'Ошибка,поле positions_id пустое',
            'education_id.required' => 'Ошибка,поле education_id пустое',
            'solutions_id.required' => 'Ошибка,поле solutions_id пустое',
        ];
    }

}
