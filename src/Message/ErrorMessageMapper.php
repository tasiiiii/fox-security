<?php

namespace Tasiiiii\FoxSecurity\Message;

use Tasiiiii\FoxSecurity\Rule\EqualRule;
use Tasiiiii\FoxSecurity\Rule\LengthRule;
use Tasiiiii\FoxSecurity\Rule\SameWithOtherRule;
use Tasiiiii\FoxSecurity\Rule\SpecialCharacterRule;

class ErrorMessageMapper
{
    private array $defaultMapper = [
        LengthRule::class           => 'Минимальная длина пароля - {{ minLength }}',
        EqualRule::class            => 'Пароль уязвим для подбора',
        SameWithOtherRule::class    => 'Пароль содержит прочие похожие данные',
        SpecialCharacterRule::class => 'Пароль не включает специальные символы - {{ requiredCharacters }}'
    ];

    public function getByRule(string $rule): string
    {
        return $defaultError[$rule] ?? 'Пароль не является надежным';
    }
}