<?php

namespace anas\app\Validation;

class ErrorsBag
{

    protected array $errors = [];


    /**
     * @param $field
     * @param $error
     * @return void
     */
    public function setErrors($field, $error): void
    {
        $this->errors[$field][] = $error;
    }


    /**
     * @return array
     */
    public function getErrors(): array
    {
        return $this->errors;
    }
}