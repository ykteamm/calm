<?php

namespace App\Http\Requests;

use App\Enums\MeditationGroupEnum;
use App\Enums\MeditationTypeEnum;
use App\Rules\CategoryExists;
use App\Rules\MeditatorExists;
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
            'meditator_id' => [$required, new MeditatorExists],
            'category_id' => [$required, new CategoryExists],
            'type' => [$required, MeditationTypeEnum::in()],
            'group' => [$required, MeditationGroupEnum::in()],
            'translations' => [$required, 'array'],
            'translations.*' => [$required, 'array'],
            'translations.*.id' => ['nullable'],
            'translations.*.name' => [$required, 'string'],
            'translations.*.language_code' => [$required, 'string'],
        ];
    }
}
