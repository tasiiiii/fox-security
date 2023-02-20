<?php

namespace Tasiiiii\FoxSecurity\Rule;

class SameWithOtherRule implements RuleInterface
{
    public function __construct(
        private readonly array $otherData = []
    )
    {}

    public function getDangerLevel(): int
    {
        return RuleDangerLevelEnum::High->value;
    }

    public function execute(string $password): bool
    {
        foreach ($this->otherData as $item) {
            $regExp = sprintf('~%s~', $item);
            if (preg_match($regExp, $password)) {
                return false;
            }
        }

        return true;
    }
}