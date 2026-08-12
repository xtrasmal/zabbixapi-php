# JSON-RPC client

Most code should use `ZabbixApi`:

```php
$hosts = $zabbix->hosts->get([
    'output' => ['hostid', 'host'],
]);
```

The lower-level `JsonRpcClient` is available when you need raw JSON-RPC 2.0 envelopes.

```php
use Idiot\Zabbix\Clients\HttpClient;
use Idiot\Zabbix\Clients\JsonRpcClient;

$client = new JsonRpcClient(new HttpClient());

$responses = $client->batch(
    url: 'https://zabbix.example/api_jsonrpc.php',
    calls: [
        [
            'method' => 'host.get',
            'id' => 1,
            'params' => [
                'output' => ['hostid', 'host'],
            ],
        ],
        [
            'method' => 'user.logout',
            'id' => 2,
            'params' => [],
        ],
    ],
    bearerToken: 'your-zabbix-api-token',
);

$hosts = $responses[0]->result;
$loggedOut = $responses[1]->result;
```

## Boundaries

`HttpClient` owns HTTP transport and JSON encode/decode boundaries.

`JsonRpcClient` owns JSON-RPC envelopes, request ids, single-response validation, batch response validation, and response reordering.

`ZabbixApi` owns Zabbix endpoint/token state and delegates transport work.

## Batch Ordering

JSON-RPC 2.0 allows batch responses to arrive in any order. `JsonRpcClient::batch()` matches responses by id and returns them in request order.

The high-level `$zabbix->batch()` API uses that behavior and returns only result values.
