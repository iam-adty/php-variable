<?php namespace IamAdty\Variable;

use IamAdty\Variable\Rule\Result;

class Rule
{
    public $childRules = [];
    public $value = null;
    public $status = true;

    public function __construct(...$params)
    {
        foreach ($params as $param) {
            if (is_a($param, Rule::class) || is_callable($param)) {
                $this->childRules[] = $param;
            }
        }
    }

    public function setValue($value = null)
    {
        $this->value = $value;
        return $this;
    }

    public function rule()
    {
        return new Result($this->status, $this->status ? $this->value : null);
    }

    public function childRules()
    {
        $result = new Result();

        foreach ($this->childRules as $rule) {
            if (is_callable($rule)) {
                $result = $rule($this->value);
            } elseif (is_a($rule, Rule::class)) {
                $result = $rule->setValue($this->value)->getResult();
            }

            $this->value = $result->getValue();
            $this->status = $this->status && $result->getStatus();
        }

        return $this;
    }

    public function getResult()
    {
        return $this->childRules()->rule();
    }

    public static function create(...$params)
    {
        return new self(...$params);
    }
}
