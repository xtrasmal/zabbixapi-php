<?php

declare(strict_types=1);

use Idiot\Zabbix\ZabbixApi;

require dirname(__DIR__) . '/vendor/autoload.php';

function env_string(string $name): string
{
    $value = getenv($name);

    if (!is_string($value) || '' === trim($value)) {
        throw new RuntimeException(sprintf('Missing required environment variable %s.', $name));
    }

    return $value;
}

function zabbix_from_env(): ZabbixApi
{
    return new ZabbixApi([
        'url' => env_string('ZABBIX_URL'),
        'token' => env_string('ZABBIX_TOKEN'),
    ]);
}

function print_json(array|bool|float|int|string|null $value): void
{
    echo json_encode($value, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_THROW_ON_ERROR) . PHP_EOL;
}
