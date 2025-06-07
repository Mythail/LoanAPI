<?php

use yii\db\Connection;

$db = [
    'class' => Connection::class,
    'dsn' => "pgsql:host=$_ENV[DB_HOST];port=$_ENV[DB_PORT];dbname=$_ENV[DB_NAME]",
    'username' => $_ENV['DB_USER'],
    'password' => $_ENV['DB_PASSWORD'],
    'charset' => 'utf8',
];

if ($_ENV['APP_ENV'] === ENVIRONMENT_PRODUCTION) {
    $db = [
        ...$db,

        // Schema cache options (for production environment)
        'enableSchemaCache' => true,
        'schemaCacheDuration' => 60,
        'schemaCache' => 'cache',
    ];
}

return $db;