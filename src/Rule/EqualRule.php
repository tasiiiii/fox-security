<?php

namespace Tasiiiii\FoxSecurity\Rule;

class EqualRule implements RuleInterface
{
    public function __construct(
        private readonly array $badPasswords = []
    )
    {}

    public function getDangerLevel(): int
    {
        return RuleDangerLevelEnum::High->value;
    }

    public function execute(string $password): bool
    {
        return !in_array($password, $this->badPasswords);
    }
}