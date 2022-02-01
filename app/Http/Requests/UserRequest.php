<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserRequest extends FormRequest
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
            'password' => 'required|max:20',
            'profile_photo_path' => 'required|max:150',
        ];
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

    public function messages()
    {
        return [
            'email.required' => 'Ошибка,поле email пустое',
            'phone.required' => 'Ошибка,поле phone пустое',
            'name.required' => 'Ошибка,поле name пустое',
            'surname.required' => 'Ошибка,поле surname пустое',
            'password.required' => 'Ошибка,поле password пустое',
            'profile_photo_path.required' => 'Ошибка,поле profile_photo_path пустое',
        ];
    }

}
