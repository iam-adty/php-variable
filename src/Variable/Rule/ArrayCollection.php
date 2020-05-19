<?php namespace IamAdty\Variable\Rule;

use IamAdty\Config;
use IamAdty\Variable\Rule;
use IamAdty\Variable\Rule\ArrayKey;

class ArrayCollection extends Rule
{
	public function childRules()
	{
		if (is_array($this->value)) {
			$values = [];
			foreach ($this->value as $key => $value) {
				$result = new Result();
				foreach ($this->childRules as $rule) {
					$input = $value;
					if (is_a($rule, ArrayKey::class)) {
                        $input = $key;
                        $rule->setConfig(new Config('array', $this->value));
					} elseif (is_a($rule, ArrayValue::class)) {
                        $rule->setConfig(new Config('array', $this->value));
					}

					if (is_a($rule, Rule::class)) {
						$r = $rule->setValue($input)->getResult();
					} elseif (is_callable($rule)) {
						$r = $rule($input);
					}

					$result->setStatus($result->getStatus() && $r->getStatus());
					$result->setValue($r->getValue());
				}

				if ($result->getStatus()) {
					$values[] = $result->getValue();
				}
			}

			$this->value = $values;
			$this->status = true;
		} else {
			$this->value = null;
			$this->status = false;
		}

		return $this;
	}
}
