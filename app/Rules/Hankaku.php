<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Hankaku implements Rule
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
        $reserveds = array("admin", "users", "links", "dashboard");
        if (preg_match('/^[a-zA-Z_0-9]+$/', $value)) {
            foreach ($reserveds as $reserved) {
                if ($reserved == $value){
                    return false;
                }
            }
            return strlen($value) >= 4 ? true : false;
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
        return 'アカウントIDは半角英数字・4文字以上で入力してください';
    }
}
