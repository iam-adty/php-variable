<?php namespace IamAdty\Variable\Rule;

class Result
{
    public $status = true;
    public $value = null;

    public function __construct($status = false, $value = null)
    {
        $this->status = $status;
        $this->value = $value;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function setStatus($status = true)
    {
        $this->status = $status;
        return $this;
    }

    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }
}
