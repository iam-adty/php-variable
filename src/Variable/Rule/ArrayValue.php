<?php namespace IamAdty\Variable\Rule;

use IamAdty\Variable\Rule;

class ArrayValue extends Rule
{
    public $array = [];

    public function setArray($array = [])
    {
        $this->array = $array;
    }

	public function rule()
	{
		$this->status = $this->status && in_array($this->value, $this->array);
		return parent::rule();
	}
}
