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

        $group = [];
        foreach ($this->type as $name => $type) {
            $group[$name] = array_filter($this->value, function ($item) use ($type) {
                if (is_array($type)) {
                    $result = false;
                    foreach ($type as $t) {
                        d($t);
                        if (is_string($item)) {
                            d($item);
                        }
                        $result = is_a($item, $t);
                    }
                    return $result;
                } else {
                    return is_a($item, $type);
                }
            });
        }

        $this->value = $group;

        return parent::rule();
    }

    use RuleFactoryTrait;
}
