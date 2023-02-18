<?php

namespace Tasiiiii\FoxSecurity;

use Tasiiiii\FoxSecurity\Contract\ResultInterface;
use Tasiiiii\FoxSecurity\Rule\RulePriorityEnum;

class Result implements ResultInterface
{
    private int   $priorityAccumulation = 0;
    private array $errors               = [];

    public function getPriorityAccumulation(): int
    {
        return $this->priorityAccumulation;
    }

    public function addPriority(int $priority): self
    {
        $this->priorityAccumulation += $priority;

        return $this;
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

    public function addError(string $error): self
    {
        $this->errors[] = $error;

        return $this;
    }

    public function isValid(): bool
    {
        return $this->priorityAccumulation >= RulePriorityEnum::High->value;
    }
}