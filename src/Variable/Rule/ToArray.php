<?php namespace IamAdty\Variable\Rule;

use IamAdty\Variable\Rule;

class ToArray extends Rule
{
	public function rule()
	{
		if (!is_array($this->value)) {
			$this->value = [
				$this->value
			];
		}

		$this->status  = $this->status && true;

		return parent::rule();
	}
}
