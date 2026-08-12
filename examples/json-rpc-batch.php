<?php

declare(strict_types=1);

use Idiot\Zabbix\Clients\HttpClient;
use Idiot\Zabbix\Clients\JsonRpcClient;

require __DIR__ . '/bootstrap.php';

$client = new JsonRpcClient(new HttpClient());

$responses = $client->batch(
    url: rtrim(env_string('ZABBIX_URL'), '/') . '/api_jsonrpc.php',
    calls: [
        [
            'method' => 'apiinfo.version',
            'id' => 1,
            'params' => [],
        ],
        [
            'method' => 'host.get',
            'id' => 2,
            'params' => [
                'output' => ['hostid', 'host'],
                'limit' => 5,
            ],
        ],
    ],
    bearerToken: env_string('ZABBIX_TOKEN'),
);

print_json([
    'api_version' => $responses[0]->result,
    'hosts' => $responses[1]->result,
]);
