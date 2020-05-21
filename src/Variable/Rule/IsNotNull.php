<?php namespace IamAdty\Variable\Rule;

use IamAdty\Variable\Rule;

class IsNotNull extends Rule
{
    public function rule()
    {
        $this->status = $this->status && !is_null($this->value);
        return parent::rule();
    }

    use RuleFactoryTrait;
}
