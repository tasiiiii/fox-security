<?php

namespace Tasiiiii\FoxSecurity;

use Exception;

class ConfigContainer
{
    private static ?ConfigContainer $instance   = null;
    private static string           $configPath = __DIR__ . '/../config/fox-security.php';

    private array $config;

    private function __construct()
    {
        $this->config = require_once self::$configPath;
    }

    public function getValue(string $key): mixed
    {
        return $this->config[$key];
    }

    public static function get(): ConfigContainer
    {
        if (is_null(self::$instance)) {
            self::$instance = new ConfigContainer();
        }

        return self::$instance;
    }

    public static function setConfigPath(string $configPath): void
    {
        self::$configPath = $configPath;
    }
}