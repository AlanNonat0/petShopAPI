<?php

namespace App\Http\Requests;

trait VerifyRules
{
    private function verifyMethod($rules)
    {
        if ($this->method() === 'PATCH') {

            return $this->sortRules($rules);
        }

        return $rules;
    }

    private function sortRules($rules)
    {
        $dynamicsRules = array();

        foreach ($rules as $input => $rule) {

            if (array_key_exists($input, $this->all())) {
                $dynamicsRules[$input] = $rule;
            }

        }

        return $dynamicsRules;
    }
}