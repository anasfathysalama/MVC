<?php

namespace anas\app\Validation\Rules\Contracts;

trait FiledIsExistsTrait
{
    public function isFiledExists()
    {

        if (!array_key_exists($this->filed, $this->data)) {
            return false;
        }
    }
}