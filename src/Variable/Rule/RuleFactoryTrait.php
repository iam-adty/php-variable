<?php namespace IamAdty\Variable\Rule;

trait RuleFactoryTrait
{
    public static function create(...$params)
    {
        return new self(...$params);
    }
}
