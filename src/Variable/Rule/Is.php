<?php namespace IamAdty\Variable\Rule;

use IamAdty\Variable\Rule;

class Is extends Rule
{
    protected $type = null;

    public function rule()
    {
        $result = false;
        if (!is_null($this->type)) {
            $typeName = 'is_' . $this->type;
            $result = $typeName($this->value);
        }

        $this->status = $this->status && $result;
        return parent::rule();
    }

    use RuleFactoryTrait;
}
