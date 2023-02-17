<?php

namespace Tasiiiii\FoxSecurity\Rule;

enum RulePriorityEnum: int
{
    case High   = 100;
    case Medium = 35;
    case Low    = 20;
}