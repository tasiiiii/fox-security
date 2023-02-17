<?php

namespace Tasiiiii\FoxSecurity\Rule;

class LengthRule implements RuleInterface
{
    public function __construct(
        private readonly int $minLength = 8
    )
    {}

    public function getPriority(): int
    {
        return RulePriorityEnum::High->value;
    }

    public function execute(string $password): bool
    {
        return strlen($password) >= $this->minLength;
    }
}