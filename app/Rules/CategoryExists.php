<?php

namespace App\Rules;

use App\Models\Category;
use App\Models\User;
use Illuminate\Contracts\Validation\Rule;

class CategoryExists implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return !(Category::find($value) == null);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Category not found';
    }
}
