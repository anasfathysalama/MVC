<?php

namespace anas\app\Validation;


class Validation
{

    protected array $rules = [];
    protected ErrorsBag $errorsBag;
    protected RuleMapper $ruleMapper;

    /**
     * @param array $rules
     */
    public function __construct(array $rules)
    {
        $this->rules = $rules;
        $this->errorsBag = new ErrorsBag();
        $this->ruleMapper = new RuleMapper();
    }


    /**
     * @param array $rules
     * @return void
     */
    public function setRules(array $rules): void
    {
        foreach ($rules as $filed => $rule) {
            $this->rules[$filed] = $rule;
        }
    }

    /**
     * @param array $data
     * @return void
     */
    public function validate(array $data): void
    {
        foreach ($this->rules as $filed => $rules) {
            foreach ($rules as $rule) {
                $rule = $this->getRule($rule);
                $this->applyRule($rule, $filed, $data);
            }
        }
    }

    protected function getRule($key)
    {

        if (is_string($key)) {
            $exploded = explode(':', $key);
            $options = [];
            if (count($exploded) === 2) {
                $options = explode(',', $exploded[1]);
            }
            return $this->ruleMapper->getRuleInstance($exploded[0], $options);
        }
        return $key;
    }


    /**
     * @return bool
     */
    public function pass(): bool
    {
        return empty($this->errorsBag->getErrors());
    }

    /**
     * @return array
     */
    public function errors(): array
    {
        return $this->errorsBag->getErrors();
    }


    private function applyRule($rule, $filed, $data): void
    {
        if (!is_null($rule) && !$rule->apply($filed, $data)) {
            $this->errorsBag->setErrors($filed, $rule->message($filed));
        }
    }

}