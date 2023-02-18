<?php

namespace Tasiiiii\FoxSecurity\Message;

use ReflectionClass;
use ReflectionException;
use Tasiiiii\FoxSecurity\Rule\LengthRule;
use Tasiiiii\FoxSecurity\Rule\RuleInterface;

class ErrorMessageBuilder
{
    private ErrorMessageMapper $errorMessageMapper;

    public function __construct()
    {
        $this->errorMessageMapper = new ErrorMessageMapper();
    }

    /**
     * @throws ReflectionException
     */
    public function build(RuleInterface $rule): string
    {
        $reflection   = new ReflectionClass($rule);
        $errorMessage = $this->errorMessageMapper->getByRule($reflection->getName());

        $matches = [];
        preg_match('~{{ \w+ }}~', $errorMessage, $matches);

        $properties = $reflection->getProperties();
        foreach ($matches as $match) {
            $propertyName = substr($match, 0, -2);
            $propertyName = trim(substr($propertyName, 2));

            foreach ($properties as $property) {
                if ($property->name === $propertyName) {
                    $value = $reflection->getProperty($propertyName)->getValue($rule);

                    if (is_array($value)) {
                        $value = implode(' ', $value);
                    }

                    $errorMessage = str_replace("{{ $propertyName }}", $value, $errorMessage);
                }
            }
        }

        return $errorMessage;
    }
}