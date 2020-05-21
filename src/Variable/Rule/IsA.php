<?php namespace IamAdty\Variable\Rule;

use IamAdty\Variable\Rule;

class IsA extends Rule
{
    public $class = null;

    public function __construct($class, ...$params)
    {
        $this->class = $class;
        parent::__construct(...$params);
    }

    public function rule()
    {
        $this->status = $this->status && is_a($this->value, $this->class);
        return parent::rule();
    }

    use RuleFactoryTrait;
}
