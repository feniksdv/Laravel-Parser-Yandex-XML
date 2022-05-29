<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
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
            'name'      => ['required', 'string'],
            'email'     => ['required', 'email'],
            'tel'       => ['required', 'integer'],
            'massage'   => ['required', 'string']
        ];
    }

    /**
     * @return array
     */
    public function messages(): array
    {
        return [
            'required' => 'Поле :attribute обязательно для заполнения',
            'string'   => 'Поле :attribute, должно быть строкой',
            'integer'  => 'Поле :attribute, должно быть числовым',
        ];
    }

    /**
     * @return array
     */
    public function attributes(): array
    {
        return [
            'name'    => 'имя',
            'email'   => 'почта',
            'massage' => 'сообщение',
            'tel'     => 'телефон'
        ];
    }
}
