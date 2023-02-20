<?php

namespace Tasiiiii\FoxSecurity\Rule;

enum RuleDangerLevelEnum: int
{
    case High   = 100;
    case Medium = 35;
    case Low    = 20;
}