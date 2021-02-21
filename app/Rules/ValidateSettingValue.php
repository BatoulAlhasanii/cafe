<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidateSettingValue implements Rule
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
        if (request('setting_name') === 'activate_discount') {
            if(intval($value) === 0 || intval($value) === 1) {
                return true;
            }
            else {
                return false;
            }
        }
        else if (request('setting_name') === 'tax') {
            if(is_numeric($value) && floatval($value) >= 0 ) {
                return true;
            }
            else {
                return false;
            }
        }

        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The value is not valid.';
    }
}
