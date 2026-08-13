# JSON-RPC client

Most code should use `ZabbixApi`:

```php
$hosts = $zabbix->hosts->get([
    'output' => ['hostid', 'host'],
]);
```

The lower-level `JsonRpcClient` accepts `Request` objects and returns JSON-RPC 2.0 response envelopes.

```php
use GuzzleHttp\Client;use Idiot\Zabbix\Api\Requests\HostGetRequest;use Idiot\Zabbix\Api\Requests\UserLogoutRequest;use Idiot\Zabbix\Clients\HttpClient;use Idiot\Zabbix\Clients\JsonRpcClient;use Idiot\Zabbix\ZabbixApi;

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

## See also

- [Transport](architecture/transport.md) — how `JsonRpcClient`, `HttpClient`, and `Options` divide the work, and how batch responses are ordered by id
- [Batching](batching.md) — the high-level `$zabbix->batch()` how-to
