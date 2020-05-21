<?php namespace IamAdty\Variable\Rule;

use IamAdty\Config\ConfigCollectionTrait;
use IamAdty\Variable\Rule;

class ArrayKey extends Rule
{
    public $array = [];

    use ConfigCollectionTrait;

    public function rule()
    {
        $this->status = $this->status && array_key_exists($this->value, $this->array);
        return parent::rule();
    }

    use RuleFactoryTrait;
}
