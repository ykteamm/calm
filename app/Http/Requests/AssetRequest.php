<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AssetRequest extends FormRequest
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
            'files' => ['nullable', 'array'],
            'files.*' => [
                'required',
                'file',
                'mimes:jpg,jpeg,png,gif,pdf,doc,docx,xls,xlsx,ppt,pptx,mp4,avi,mov,mpg,mpeg,flv,mp3,wav,ogg,aac,flac,wma,m4a',
                'max:4096'
            ],
            'file' => [
                'sometimes',
                'required',
                'file',
                'mimes:jpg,jpeg,png,gif,svg,pdf,doc,docx,xls,xlsx,ppt,pptx,mp4,avi,mov,mpg,mpeg,flv,mp3,wav,ogg,aac,flac,wma,m4a',
            ],
        ];
    }
}
