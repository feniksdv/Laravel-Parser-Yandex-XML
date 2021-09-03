<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateResourceRequest extends FormRequest
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
            'url'     => ['required', 'url'],
            'status' => ['required', 'string']
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
            'url'   => 'Поле :attribute, должно быть ссылкой',
        ];
    }

    /**
     * @return array
     */
    public function attributes(): array
    {
        return [
            'url'    => 'ссылка на ресурс',
            'status'   => 'статус',
        ];
    }
}
