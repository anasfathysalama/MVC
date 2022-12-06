<?php

namespace anas\app\Validation\Rules;

use anas\app\Validation\Rules\Contracts\Rule;

class BetweenRule extends Rule
{

    public int $min;
    public int $max;

    /**
     * @param int $min
     * @param int $max
     */
    public function __construct(int $min, int $max)
    {
        $this->min = $min;
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
        if (strlen($data[$filed]) < $this->min) {
            return false;
        }

        return true;
    }

    public function message($filed): string
    {
        return "{$filed}  should be between {$this->min} and {$this->max}";
    }
}