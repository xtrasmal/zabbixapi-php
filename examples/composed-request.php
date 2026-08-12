<?php

declare(strict_types=1);

require __DIR__ . '/bootstrap.php';

$zabbix = zabbix_from_env();

$request = $zabbix
    ->requests()
    ->hosts
    ->filter(['host' => ['srv-01', 'srv-02']])
    ->output(['hostid', 'host', 'name']);

$hosts = $zabbix->request($request);

print_json($hosts);
