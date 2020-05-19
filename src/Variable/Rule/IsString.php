<?php namespace IamAdty\Variable\Rule;

use IamAdty\Variable\Rule;

class IsString extends Rule
{
	public function rule()
	{
		$this->status = $this->status && is_string($this->value);
		return parent::rule();
	}
}
