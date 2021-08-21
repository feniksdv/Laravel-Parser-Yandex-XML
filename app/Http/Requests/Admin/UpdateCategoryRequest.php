<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
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
            'title'     => ['required', 'string'],
            'status_id' => ['required', 'not_in:0']
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
        ];
    }

    /**
     * @return array
     */
    public function attributes(): array
    {
        return [
            'title'    => 'название статьи',
            'status_id'   => 'статус',
        ];
    }
}
