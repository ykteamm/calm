<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class RuleUpsertRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $required = ($this->isMethod('put')) ? 'nullable' : 'required';
        
        return [
            'package_id' => [$required, 'integer'],
            'result_id' => ['nullable'],
            'min' => [$required, 'integer'],
            'max' => [$required, 'integer']
        ];
    }
}
