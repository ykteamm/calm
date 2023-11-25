<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AudioUploadRequest extends FormRequest
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
            'translations' => ['nullable', 'array'],
            'translations.*' => [$required, 'array'],
            'translations.*.id' => ['nullable'],
            'translations.*.name' => [$required, 'string'],
            'translations.*.language_code' => [$required, 'string'],
            'type' => ['nullable'],
            'file' => ['sometimes', 'file', 'mimes:mp3,wav,ogg,aac,flac,wma,m4a']
        ];
    }
}
