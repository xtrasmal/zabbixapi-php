<?php

declare(strict_types=1);

require __DIR__ . '/bootstrap.php';

$zabbix = zabbix_from_env();

$hosts = $zabbix->hosts->get([
    'output' => ['hostid', 'host', 'name', 'status'],
    'selectInterfaces' => ['interfaceid', 'ip', 'dns', 'port'],
    'sortfield' => 'host',
]);

print_json($hosts);
