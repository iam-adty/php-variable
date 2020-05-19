<?php namespace IamAdty\Variable\Rule;

use IamAdty\Variable\Rule;

class IsArray extends Rule
{
	public function rule()
	{
		$this->status = $this->status && is_array($this->value);
		return parent::rule();
	}
}
