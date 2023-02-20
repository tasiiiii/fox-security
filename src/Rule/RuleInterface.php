<?php

namespace Tasiiiii\FoxSecurity\Rule;

interface RuleInterface
{
    public function getDangerLevel(): int;
    public function execute(string $password): bool;
}