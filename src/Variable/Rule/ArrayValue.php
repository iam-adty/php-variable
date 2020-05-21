<?php namespace IamAdty\Variable\Rule;

use IamAdty\Config\ConfigCollectionTrait;
use IamAdty\Variable\Rule;

class ArrayValue extends Rule
{
    public $array = [];

    use ConfigCollectionTrait;

    public function rule()
    {
        $this->status = $this->status && in_array($this->value, $this->array);
        return parent::rule();
    }

    use RuleFactoryTrait;
}
