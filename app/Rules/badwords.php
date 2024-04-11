<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class badwords implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $value = preg_replace("/[^ a-zA-Zالف-ی]/i","",$value);

        $badwords = Arr::flatten(config('badwords'));

        if(Str::contains(strtolower($value), $badwords)){
            $fail('The :attribute contains offensive words.');
        }
    }
}
