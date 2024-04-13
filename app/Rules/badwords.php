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

        $matches = array();
        $matchFound = preg_match_all(
            "/\b(" . implode("|", $badwords) . ")\b/i",
            $value,
            $matches
        );

        if ($matchFound) {
            $words = array_unique($matches[0]);
            $fail('The :attribute contains offensive words. ['.implode(",",$words).']');
        }
    }
}
