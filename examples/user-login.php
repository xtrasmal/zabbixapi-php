<?php

declare(strict_types=1);

use Idiot\Zabbix\ZabbixApi;

require __DIR__ . '/bootstrap.php';

$zabbix = new ZabbixApi([
    'url' => env_string('ZABBIX_URL'),
    'username' => env_string('ZABBIX_USERNAME'),
    'password' => env_string('ZABBIX_PASSWORD'),
]);

$hosts = $zabbix->hosts->get([
    'output' => ['hostid', 'host'],
]);

print_json($hosts);
