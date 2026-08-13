# JSON-RPC client

Most code should use `ZabbixApi`:

```php
$hosts = $zabbix->hosts->get([
    'output' => ['hostid', 'host'],
]);
```

The lower-level `JsonRpcClient` accepts `ZabbixRequest` objects and returns JSON-RPC 2.0 response envelopes.

```php
use GuzzleHttp\Client;
use Idiot\Zabbix\Clients\HttpClient;
use Idiot\Zabbix\Clients\JsonRpcClient;
use Idiot\Zabbix\Requests\HostGetRequest;
use Idiot\Zabbix\Requests\UserLogoutRequest;
use Idiot\Zabbix\ZabbixApi;

$client = new JsonRpcClient(new HttpClient(new Client([
    'base_uri' => 'https://zabbix.example/api_jsonrpc.php',
    'headers' => [
        'Authorization' => 'Bearer your-zabbix-api-token',
        'Content-Type' => 'application/json-rpc',
        'User-Agent' => 'Idiot/ZabbixApi;Version:' . ZabbixApi::VERSION,
    ],
])));

$responses = $client->batch(
    requests: [
        HostGetRequest::fromParams([
            'output' => ['hostid', 'host'],
        ]),
        UserLogoutRequest::fromParams([]),
    ],
);

$hosts = $responses[0]->result;
$loggedOut = $responses[1]->result;
```

## Boundaries

`HttpClient` owns HTTP transport and JSON encode/decode boundaries. It accepts JSON-ready payload arrays and expects its Guzzle client to be fully configured before injection.

`JsonRpcClient` owns JSON-RPC request body creation, response-envelope normalization, and response reordering. JSON-RPC errors stay in `JsonRpcResponse`; they are not thrown by this layer.

`ZabbixApiOptions` owns Zabbix endpoint/token configuration and resolves the configured JSON-RPC client. `ZabbixApi` validates request params and delegates transport work.

## Batch Ordering

JSON-RPC 2.0 allows batch responses to arrive in any order. `JsonRpcClient::batch()` matches responses by id and returns them in request order.

The high-level `$zabbix->batch()` API uses that behavior and returns only result values.
