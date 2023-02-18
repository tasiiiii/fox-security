<?php

namespace Tasiiiii\FoxSecurity\Rule;

class RuleCollection
{
    /**
     * @var RuleInterface[]
     */
    private array $rules = [];

    public function addRule(RuleInterface $rule): self
    {
        $this->rules[] = $rule;

        return $this;
    }

    /**
     * @return RuleInterface[]
     */
    public function getAll(): array
    {
        return $this->rules;
    }
}