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

## Composed Requests

When a request needs fluent composition before it is sent, use the request builders exposed by `ZabbixApi::requests()`.

```php
$request = $zabbix
    ->requests()
    ->hosts
    ->filter(['host' => ['srv-01', 'srv-22']])
    ->output(['hostid', 'host']);

$hosts = $zabbix->request($request);
```

Each request object exposes:

- `method()`: the Zabbix JSON-RPC method name, such as `host.get`
- `params()`: the method params array sent through JSON-RPC

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

`RequestFactory::validated()` validates params against the compiled Zabbix method schema. `RequestFactory::plain()` only maps method names to request objects.

## JSON-RPC Batch

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

The client and request builder groups match Zabbix API areas:

```php
$zabbix->hosts->get(['output' => ['hostid', 'host']]);
$zabbix->hostGroups->get(['output' => ['groupid', 'name']]);
$zabbix->items->get(['hostids' => ['10105'], 'output' => 'extend']);
$zabbix->triggers->get(['output' => 'extend']);
```

Request builders accept plain arrays. Prefer arrays for controller and service code:

```php
$request = $zabbix->requests()->hosts->get([
    'hostids' => ['10105'],
    'output' => ['hostid', 'host'],
]);

$hosts = $zabbix->request($request);
```

Generated request classes are implementation details for the API groups, fluent builders, registry, and validation tooling. Application code should not instantiate generated requests or rely on their constructor parameter lists.
