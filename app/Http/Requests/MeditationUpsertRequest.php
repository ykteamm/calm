<?php

namespace App\Http\Requests;

use App\Rules\CategoryDoesntHaveChild;
use App\Rules\CategoryExists;
use App\Rules\CategoryHaveParent;
use App\Rules\UserExists;
use Illuminate\Foundation\Http\FormRequest;

class MeditationUpsertRequest extends FormRequest
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
            'user_id' => [$required, new UserExists],
            'category_id' => [$required, new CategoryExists, new CategoryHaveParent, new CategoryDoesntHaveChild],
            'translations' => [$required, 'array'],
            'translations.*' => [$required, 'array'],
            'translations.*.id' => ['nullable'],
            'translations.*.name' => [$required, 'string'],
            'translations.*.language_code' => [$required, 'string'],
        ];
    }
}
