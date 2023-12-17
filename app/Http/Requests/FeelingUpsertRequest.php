<?php

namespace App\Http\Requests;

use App\Rules\EmojiExists;
use App\Rules\UserExists;
use Illuminate\Foundation\Http\FormRequest;

class FeelingUpsertRequest extends FormRequest
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
            'emoji_id' => [$required, new EmojiExists],
            'status' => ['nullable'],
            'story' => ['nullable', 'string']
        ];
    }
}
