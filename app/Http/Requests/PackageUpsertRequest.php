<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class PackageUpsertRequest extends FormRequest
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
            'addes' => ['nullable', 'array'],
            'updates' => ['nullable', 'array'],
            'deletes' => ['nullable', 'array'],
            'medicines' => ['nullable', 'array'],
            'medicines_old' => ['nullable', 'array'],
            'medicines_new' => ['nullable', 'array'],
            'priority' => [$required, 'integer'],
            'extra' => [$required, 'array'],
            'translations' => [$required, 'array'],
            'translations.*' => [$required, 'array'],
            'translations.*.id' => ['nullable'],
            'translations.*.name' => [$required, 'string'],
            'translations.*.language_code' => [$required, 'string'],
        ];
    }
}
