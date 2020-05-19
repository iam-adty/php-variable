<?php namespace IamAdty;

use IamAdty\Variable\Rule;
use IamAdty\Variable\Rule\Result;

class Variable
{
    public $value = null;

    public function __construct($value = null)
    {
        $this->value = $value;
    }

    public function default($default = null, ...$rules)
    {
        $isDefault = true;
        foreach ($rules as $rule) {
            if (is_callable($rule)) {
                $result = $rule($this->value);
            } elseif (is_a($rule, Rule::class)) {
                $result = $rule->setValue($this->value)->getResult();
            }

            $isDefault = $isDefault && $result->getStatus();
        }

        if ($isDefault) {
            $this->value = $default;
        }

        return $this;
    }

    public function filter(...$rules)
    {
        $result = new Result();
        foreach ($rules as $rule) {
            if (is_callable($rule)) {
                $result = $rule($this->value);
            } elseif (is_a($rule, Rule::class)) {
                $result = $rule->setValue($this->value)->getResult();
            }

            $this->value = $result->getValue();
        }

        return $this;
    }

    public static function from($value = null)
    {
        return new self($value);
    }

    public function value()
    {
        return $this->value;
    }
}
