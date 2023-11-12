<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IndexRequest extends FormRequest
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
        return [
            'pagination' => ['nullable'],
            'p' => ['nullable'],
            'rows' => ['nullable'],
            'filter' => ['nullable'],
            'sort' => ['nullable'],
            'language_code' => ['nullable'],
        ];
    }
}