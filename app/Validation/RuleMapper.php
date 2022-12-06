<?php

namespace anas\app\Validation;

use anas\app\Validation\Rules\BetweenRule;
use anas\app\Validation\Rules\MaxRule;
use anas\app\Validation\Rules\MinRule;
use anas\app\Validation\Rules\RequiredRule;

class RuleMapper
{

    public array $ruleMap = [];


    public function __construct()
    {
        $this->ruleMap = [
            'required' => RequiredRule::class,
            'min' => MinRule::class,
            'max' => MaxRule::class,
            'between' => BetweenRule::class,
        ];
    }

    public function getRuleInstance($rule, $options = [])
    {
        if (array_key_exists($rule, $this->ruleMap)) {
            return new $this->ruleMap[$rule](...$options);
        }
    }

}