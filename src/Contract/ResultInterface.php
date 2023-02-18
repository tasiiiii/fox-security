<?php

namespace Tasiiiii\FoxSecurity\Contract;

interface ResultInterface
{
    public function getPriorityAccumulation(): int;

    /**
     * @return string[]
     */
    public function getErrors(): array;

    public function isValid(): bool;
}