<?php

declare(strict_types=1);

require __DIR__ . '/bootstrap.php';

$zabbix = zabbix_from_env();

$groups = $zabbix->hostGroups->get([
    'output' => ['groupid', 'name'],
    'sortfield' => 'name',
]);

print_json($groups);
