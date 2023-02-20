# Security Fox
Библиотека для проверки надежности пароля
### Установка
    composer require tasiiiii/fox-security

### Использование
```php
<?php

require_once 'vendor/autoload.php';

use Tasiiiii\FoxSecurity\PasswordChecker;
use Tasiiiii\FoxSecurity\Rule\RuleCollection;
use Tasiiiii\FoxSecurity\Rule\LengthRule;
use Tasiiiii\FoxSecurity\Rule\EqualRule;
use Tasiiiii\FoxSecurity\Rule\SameWithOtherRule;
use Tasiiiii\FoxSecurity\Rule\SpecialCharacterRule;

$passwordChecker = new PasswordChecker();
$passwordChecker->process(
    '12345678',
    (new RuleCollection())
        ->addRule(new LengthRule())
        ->addRule(new SpecialCharacterRule())
        ->addRule(new EqualRule(['12345678']))
        ->addRule(new SameWithOtherRule(['12345678']))
);
```
## Система правил
Под правилами в данной библиотеке подразумеваются классы, реализующие интерфейс RuleInterface.

Задача таких классов - проверка надежности пароля по одному конкретному условию. Также правило должно иметь уровень опасности, выраженный в целом числе.
Каждый пользователь данной библиотеке может использовать свою систему уровней опасности.

Разработчик данной библиотеке рекомендует такую систему уровней опасности:
- меньше 20 - надежный пароль
- 20 - 50 - средний пароля
- 50 - 99 - легкий пароль
- больше 100 - пароль подвержен взлому методом брутфорса меньше чем за минуту (Пароли вида: 12345678, qwerty, 123)

### LengthRule
Проверка длины пароля, стандартное значение - 8 символов

Уровень опасности - 100

### SpecialCharacterRule
Проверка вхождения специальных символов в пароле, стандартное значение - @, !, #, ", №

Уровень опасности - 35

### EqualRule
Проверка полного соответствия пароля типовым паролям. С помощью данного правила можно обнаружать простые пароли по типу: "12345678", "123", "qwerty"

Уровень опасности - 100

### SameWithOtherRule
Проверка частичного соответствия пароля с прочими данными. С помощью данного правила можно проверять, включает ли пароль в себя другие данные пользователя, такие как - дата рождения, место рождения, почта

Уровень опасности - 100

### Создание своего правила
Чтобы создать свое правило, достаточно реализовать интерфейс RuleInterface.
```php
use Tasiiiii\FoxSecurity\Rule\RuleInterface;
use Tasiiiii\FoxSecurity\Rule\RuleDangerLevelEnum;

class MyRule implements RuleInterface
{
    public function getDangerLevel(): int
    {
        return RuleDangerLevelEnum::High->value;
    }

    public function execute(string $password): bool
    {
        return true;
    }
}
```
В случае успешного прохождения надежности пароля, метод execute должен возвращать true, иначе false.
