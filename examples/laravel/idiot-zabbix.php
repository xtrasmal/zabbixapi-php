<?php

declare(strict_types=1);

return [
    'server' => env('ZABBIX_URL'),
    'token' => env('ZABBIX_TOKEN'),
    'username' => env('ZABBIX_USERNAME'),
    'password' => env('ZABBIX_PASSWORD'),

    'verify' => env('ZABBIX_VERIFY_TLS', false),
];
