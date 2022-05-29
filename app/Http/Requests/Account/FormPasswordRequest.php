<?php

namespace App\Http\Requests\Account;

use Illuminate\Foundation\Http\FormRequest;

class FormPasswordRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'password-old'          => ['required'],
            'password'              => ['required', 'min:8', 'confirmed'],
            'password_confirmation' => ['required'],
        ];
    }

    public function messages(): array
    {
        return parent::messages(); // TODO: Change the autogenerated stub
    }

    public function attributes(): array
    {
        return parent::attributes(); // TODO: Change the autogenerated stub
    }
}
