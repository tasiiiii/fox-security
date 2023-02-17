<?php

namespace Tasiiiii\FoxSecurity\Rule;

interface RuleInterface
{
    public function getPriority(): int;
    public function execute(string $password): bool;
}