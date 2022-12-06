<?php

namespace anas\app\Validation\Rules;

use anas\app\Validation\Rules\Contracts\Rule;

class MaxRule extends Rule
{
    public int $max;

    /**
     * @param int $max
     */
    public function __construct(int $max)
    {
        $this->max = $max;
    }

    public function apply($filed, $data): bool
    {

        if (!array_key_exists($filed, $data)) {
            return false;
        }

        if (strlen($data[$filed]) >= $this->max) {
            return false;
        }

        return true;
    }

    public function message($filed): string
    {
        return "{$filed} must should equal or less than {$this->max}";
    }
}