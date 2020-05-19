<?php namespace IamAdty\Variable\Rule;

use IamAdty\Variable\Rule;

class IsSubClassOf extends Rule
{
    public $class = null;

    public function __construct($class, ...$params)
    {
        $this->class = $class;
        parent::__construct($params);
    }

    public function rule()
    {
        $this->status = $this->status && is_subclass_of($this->value, $this->class);
        return parent::rule();
    }
}
