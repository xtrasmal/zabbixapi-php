# Request building

Normal application code can call Zabbix API groups directly from the configured client.

```php
$hosts = $zabbix->hosts->get([
    'output' => ['hostid', 'host'],
]);

$filteredHosts = $zabbix->hosts->get([
    'filter' => ['host' => ['srv-01']],
    'output' => ['hostid'],
]);

$hostsByName = $zabbix->hosts->filter([
    'host' => ['srv-01'],
]);

$groups = $zabbix->hostGroups->get([
    'output' => ['groupid', 'name'],
]);

$group = $zabbix->hostGroups->create([
    'name' => 'Linux servers',
]);
```

Those helpers build the matching request object and immediately send it through `ZabbixApi::request()`.
Pass the same plain params array that Zabbix documents for the underlying method.

## Filtering

For `get` methods that support Zabbix's `filter` parameter, pass the complete params array when you also need options like `output`, `select*`, or `limit`:

```php
$hosts = $zabbix->hosts->get([
    'filter' => ['host' => ['srv-01', 'srv-02']],
    'output' => ['hostid', 'host', 'name'],
]);
```

When you only need a filter, use the shorthand:

```php
$hosts = $zabbix->hosts->filter([
    'host' => ['srv-01', 'srv-02'],
]);
```

## Batch

Use `batch()` when you want to plan several Zabbix moves and send them as one JSON-RPC batch. Inside the callback, API group calls queue requests instead of executing immediately. Results are returned in queued order.

```php
$results = $zabbix->batch(function ($batch): void {
    $batch->hosts->get([
        'filter' => ['host' => ['srv-01']],
        'output' => ['hostid', 'host'],
    ]);

    $batch->items->get([
        'hostids' => ['10105'],
        'output' => ['itemid', 'name'],
    ]);

    $batch->users->logout([]);
});

foreach ($results as $result) {
    // Result values match the queued calls above.
}
```

Outside `batch()`, the same group calls execute immediately:

```php
$hosts = $zabbix->hosts->get(['output' => ['hostid', 'host']]);
```

## Adapter Request Factory

For method-name driven adapters, use `RequestFactory`. This is useful when code receives method names as strings and still wants the request registry or optional local validation:

```php
use Idiot\Zabbix\Requests\RequestFactory;

$factory = RequestFactory::validated();

$request = $factory->make('host.get', [
    'output' => ['hostid', 'host'],
    'filter' => ['host' => ['srv-01']],
]);

$hosts = $zabbix->request($request);
```

`RequestFactory::validated()` validates params against the bundled Zabbix 7.0 JSON schema for that method. `RequestFactory::plain()` only maps method names to request objects.

## Low-Level JSON-RPC Batch

Normal Zabbix calls through `ZabbixApi` are intentionally simple. The client automatically batches its required one-time `apiinfo.version` call with the first possible API request.

For explicit JSON-RPC 2.0 batching, use the lower-level `JsonRpcClient`:

```php
use Idiot\Zabbix\Clients\HttpClient;
use Idiot\Zabbix\Clients\JsonRpcClient;

$client = new JsonRpcClient(new HttpClient());

$responses = $client->batch(
    url: 'https://zabbix.example/api_jsonrpc.php',
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
            ],
        ],
    ],
    bearerToken: 'your-zabbix-api-token',
);

$version = $responses[0]->result;
$hosts = $responses[1]->result;
```

Batch responses are returned in request order. The JSON-RPC server may return them in any order; the client reorders them by response id.

## API Groups

The client groups match Zabbix API areas:

```php
$zabbix->hosts->get(['output' => ['hostid', 'host']]);
$zabbix->hostGroups->get(['output' => ['groupid', 'name']]);
$zabbix->items->get(['hostids' => ['10105'], 'output' => 'extend']);
$zabbix->triggers->get(['output' => 'extend']);
```

Generated request classes are implementation details for the API groups, batch accumulator, registry, and validation tooling. They are method-specific params envelopes built through `fromParams()`; application code should not instantiate generated requests directly.
