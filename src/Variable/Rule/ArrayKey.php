<?php namespace IamAdty\Variable\Rule;

use IamAdty\Variable\Rule;

class ArrayKey extends Rule
{
	public $array = [];

    public function setArray($array = [])
    {
        $this->array = $array;
    }

	public function rule()
	{
		$this->status = $this->status && array_key_exists($this->value, $this->array);
		return parent::rule();
	}
}
