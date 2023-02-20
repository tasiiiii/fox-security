<?php

namespace Tasiiiii\FoxSecurity\Message;

use Tasiiiii\FoxSecurity\ConfigContainer;

class ErrorMessageMapper
{
    public function getByRule(string $rule): string
    {
        return ConfigContainer::get()->getValue('errorMessages')[$rule] ?? 'Пароль не является надежным';
    }
}