<?php

namespace Tasiiiii\FoxSecurity;

use ReflectionException;
use Tasiiiii\FoxSecurity\Message\ErrorMessageBuilder;
use Tasiiiii\FoxSecurity\Rule\RuleCollection;

class PasswordChecker
{
    private ErrorMessageBuilder $errorMessageBuilder;

    public function __construct()
    {
        $this->errorMessageBuilder = new ErrorMessageBuilder();
    }

    /**
     * @throws ReflectionException
     */
    public function process(string $password, RuleCollection $ruleCollection): Result
    {
        $result = new Result();

        foreach ($ruleCollection->getAll() as $rule) {
            if (!$rule->execute($password)) {
                $result->addDanger($rule->getDangerLevel());
                $result->addError($this->errorMessageBuilder->build($rule));
            }
        }

        return $result;
    }
}