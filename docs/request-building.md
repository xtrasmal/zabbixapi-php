# Request building

Normal application code can call Zabbix API groups directly from the configured client.

```php
$hosts = $zabbix->hosts->get([
    'output' => ['hostid', 'host'],
]);

$groups = $zabbix->hostGroups->get([
    'output' => ['groupid', 'name'],
]);
```

Those helpers build the matching request object and immediately send it through `ZabbixApi::request()`.

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

## Request Factory

For method-name driven adapters, use `RequestFactory` instead of generated constructors:

```php
use IntelliTrend\Zabbix\Requests\RequestFactory;

$factory = RequestFactory::validated();

$request = $factory->make('host.get', [
    'output' => ['hostid', 'host'],
    'filter' => ['host' => ['srv-01']],
]);

$hosts = $zabbix->request($request);
```

`RequestFactory::validated()` validates params against the compiled Zabbix method schema. `RequestFactory::plain()` only maps method names to request objects.

## API Groups

The client and request builder groups match Zabbix API areas:

```php
$zabbix->hosts->get(['output' => ['hostid', 'host']]);
$zabbix->hostGroups->get(['output' => ['groupid', 'name']]);
$zabbix->items->get(['hostids' => ['10105'], 'output' => 'extend']);
$zabbix->triggers->get(['output' => 'extend']);
```

Request builders accept plain arrays or request objects. Prefer arrays for controller and service code:

```php
use IntelliTrend\Zabbix\Requests\HostGetRequest;

$request = $zabbix->requests()->hosts->get([
    'hostids' => ['10105'],
    'output' => ['hostid', 'host'],
]);

$sameRequest = HostGetRequest::fromParams([
    'hostids' => ['10105'],
])->output(['hostid', 'host']);

$hosts = $zabbix->request($request);
```
