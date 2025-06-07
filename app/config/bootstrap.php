<?php

use Dotenv\Exception\ValidationException;

const ENVIRONMENT_PRODUCTION = 'production';
const ENVIRONMENT_DEVELOPMENT = 'development';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__, 2));
$dotenv->load();

// Проверка наличия всех переменных среды
try {
    $dotenv->required([
        'APP_ENV',
        'DB_HOST',
        'DB_PORT',
        'DB_NAME',
        'DB_USER',
        'DB_PASSWORD',
    ])->required();
} catch (ValidationException $e) {
    http_response_code(500);
    exit($e->getMessage());
}

if ($_ENV['APP_ENV'] === ENVIRONMENT_DEVELOPMENT) {
    defined('YII_DEBUG') or define('YII_DEBUG', true);
    defined('YII_ENV') or define('YII_ENV', 'dev');
}
