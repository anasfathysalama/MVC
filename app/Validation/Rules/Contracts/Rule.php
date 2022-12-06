<?php

namespace anas\app\Validation\Rules\Contracts;

abstract class Rule
{
    //use FiledIsExistsTrait ;

    protected array $data = [];
    protected string $filed ;

    abstract public function apply($filed, $data): bool;

    abstract public function message($filed): string;

}