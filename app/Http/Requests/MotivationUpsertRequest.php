<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class MotivationUpsertRequest extends FormRequest
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
        $required = ($this->isMethod('put')) ? 'nullable' : 'required';
        
        return [
            'status' => ['nullable', 'string'],
            'translations' => [$required, 'array'],
            'translations.*' => [$required, 'array'],
            'translations.*.id' => ['nullable'],
            'translations.*.text' => [$required, 'string'],
            'translations.*.author' => [$required, 'string'],
            'translations.*.language_code' => [$required, 'string'],
        ];
    }
}
