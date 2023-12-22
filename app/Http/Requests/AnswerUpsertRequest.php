<?php

namespace App\Http\Requests;

use App\Enums\AnswerTypeEnum;
use App\Rules\MedicineExists;
use App\Rules\PackageExists;
use App\Rules\TestExists;
use Illuminate\Foundation\Http\FormRequest;

class AnswerUpsertRequest extends FormRequest
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
            'test_id' => [$required, 'string', new TestExists],
            'package_id' => [$required, 'string', new PackageExists],
            'medicine_id' => [$required, 'string', new MedicineExists],
            'type' => [$required, AnswerTypeEnum::in()],
            'order' => [$required],
            'translations' => [$required, 'array'],
            'translations.*' => [$required, 'array'],
            'translations.*.id' => ['nullable'],
            'translations.*.name' => [$required, 'string'],
            'translations.*.language_code' => [$required, 'string'],
        ];
    }
}
