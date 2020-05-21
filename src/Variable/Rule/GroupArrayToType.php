<?php namespace IamAdty\Variable\Rule;

use IamAdty\Variable\Rule;

class GroupArrayToType extends Rule
{
    public $type = [];

    public function __construct($type, ...$params)
    {
        $this->type = $type;
        parent::__construct(...$params);
    }

    public function rule()
    {
        $this->status = $this->status && true;

        $value = [];
        foreach ($this->type as $type) {
            $value[$type] = array_filter($this->value, function ($item) use ($type) {
                return is_a($item, $type);
            });
        }

        $this->value = $value;

        return parent::rule();
    }

    use RuleFactoryTrait;
}
