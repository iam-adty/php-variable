<?php namespace IamAdty\Variable\Rule;

use IamAdty\Variable\Rule;

class IsEmpty extends Rule
{
    public function rule()
    {
        $this->status = $this->status && empty($this->value);
        return parent::rule();
    }

    use RuleFactoryTrait;
}
