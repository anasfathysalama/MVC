<?php

namespace anas\app\Validation\Rules;

use anas\app\Validation\Rules\Contracts\Rule;

class MinRule extends Rule
{

    public int $min;

    /**
     * @param int $min
     */
    public function __construct(int $min)
    {
        $this->min = $min;
    }

    public function apply($filed, $data): bool
    {
        if (!array_key_exists($filed, $data)) {
            return false;
        }

        if (strlen($data[$filed]) < $this->min) {
            return false;
        }

        return true;
    }

    public function message($filed): string
    {
        return "{$filed} must should not be less than {$this->min}";
    }
}