<?php

return [
    /**
     * Ошибки при не успешном прохождении проверки надежности пароля
     * В экранировании {{ var }} - указываются названия свойств критериев надежности пароля
     */
    'errorMessages' => [
        Tasiiiii\FoxSecurity\Rule\LengthRule::class           => 'Минимальная длина пароля - {{ minLength }}',
        Tasiiiii\FoxSecurity\Rule\SpecialCharacterRule::class => 'Пароль не включает специальные символы - {{ requiredCharacters }}',
        Tasiiiii\FoxSecurity\Rule\EqualRule::class            => 'Пароль уязвим для подбора',
        Tasiiiii\FoxSecurity\Rule\SameWithOtherRule::class    => 'Пароль содержит похожие данные',
    ],

    /**
     * Уровень опасности пароля, после которого он считается не валидным
     */
    'validLimit' => Tasiiiii\FoxSecurity\Rule\RuleDangerLevelEnum::High->value,
];