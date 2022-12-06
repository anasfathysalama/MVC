<?php

namespace anas\app\Validation\Rules;

use anas\app\Validation\Rules\Contracts\Rule;

class RequiredRule extends Rule
{
    public function apply($filed, $data): bool
    {
        if (!array_key_exists($filed, $data)) {
            return false;
        }

        if ($data[$filed] === '') {
            return false;
        }
        return true;
    }

    public function message($filed): string
    {
        return "{$filed} is required";
    }
}