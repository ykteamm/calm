<?php

namespace App\Http\Requests;

use App\Enums\QuestionTypeEnum;
use App\Rules\CategoryExists;
use App\Rules\IssueExists;
use Illuminate\Foundation\Http\FormRequest;

class QuestionUpsertRequest extends FormRequest
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
            'issue_id' => [$required, 'string', new IssueExists],
            'category_id' => [$required, 'string', new CategoryExists],
            'translations' => [$required, 'array'],
            'translations.*' => [$required, 'array'],
            'translations.*.id' => ['nullable'],
            'translations.*.name' => [$required, 'string'],
            'translations.*.language_code' => [$required, 'string'],
        ];
    }
}
