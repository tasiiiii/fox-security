<?php

namespace Tasiiiii\FoxSecurity\Rule;

class SpecialCharacterRule implements RuleInterface
{
    public function __construct(
        private readonly array $requiredCharacters = ['@', '!', '#', '"', '№'],
    )
    {}

    public function getPriority(): int
    {
        return RulePriorityEnum::Medium->value;
    }

    public function execute(string $password): bool
    {
        foreach ($this->requiredCharacters as $requiredCharacter) {
            $regExp = sprintf('~%s~', $requiredCharacter);
            if (preg_match($regExp, $password)) {
                return true;
            }
        }

        return false;
    }
}