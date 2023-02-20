<?php

namespace Tasiiiii\FoxSecurity;

use Tasiiiii\FoxSecurity\Contract\ResultInterface;
use Tasiiiii\FoxSecurity\Rule\RuleDangerLevelEnum;

class Result implements ResultInterface
{
    private int   $dangerLevelAccumulation = 0;
    private array $errors                  = [];

    public function getDangerLevelAccumulation(): int
    {
        return $this->dangerLevelAccumulation;
    }

    public function addDanger(int $dangerLevel): self
    {
        $this->dangerLevelAccumulation += $dangerLevel;

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
        return $this->dangerLevelAccumulation <= RuleDangerLevelEnum::High->value;
    }
}