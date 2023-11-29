<?php

namespace App\Http\Requests;

use App\Rules\GratitudeExists;
use App\Rules\UserExists;
use Illuminate\Foundation\Http\FormRequest;

class ReplyUpsertRequest extends FormRequest
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
            'gratitude_id' => [$required, new GratitudeExists],
            'text' => [$required, 'string'],
        ];
    }
}
