<?php

declare(strict_types=1);

require __DIR__ . '/bootstrap.php';

$zabbix = zabbix_from_env();

$results = $zabbix->batch(function ($batch): void {
    $batch->hosts->get([
        'filter' => ['host' => ['srv-01', 'srv-02']],
        'output' => ['hostid', 'host', 'name'],
    ]);

    $batch->items->get([
        'hostids' => ['10105'],
        'output' => ['itemid', 'name'],
    ]);
});

foreach ($results as $result) {
    print_json($result);
}
