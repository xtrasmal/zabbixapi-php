# Request building

For raw method calls, use `ZabbixApi::call()`.

```php
$hosts = $zabbix->call('host.get', [
    'output' => ['hostid', 'host'],
]);
```

For request objects, use `ZabbixApi::request()`.

```php
use IntelliTrend\Zabbix\Api\ZabbixRequestApi;

$requests = new ZabbixRequestApi();

$request = $requests
    ->hosts
    ->filter(['host' => ['srv-01', 'srv-22']])
    ->output(['hostid', 'host']);

$hosts = $zabbix->request($request);
```

## Request Factory

For method-name driven code, use `RequestFactory` instead of generated constructors:

```php
use IntelliTrend\Zabbix\Requests\RequestFactory;

$requests = RequestFactory::validated();

$request = $requests->make('host.get', [
    'output' => ['hostid', 'host'],
    'filter' => ['host' => ['srv-01']],
]);

$hosts = $zabbix->request($request);
```

`RequestFactory::validated()` validates params against the compiled Zabbix method schema. `RequestFactory::plain()` only maps method names to request objects.

## Facade Helpers

The wrapper groups match Zabbix API areas:

```php
$requests->hosts->get(['output' => ['hostid', 'host']]);
$requests->hosts->byHost('srv-01')->output(['hostid', 'host']);
$requests->hostGroups->get(['output' => ['groupid', 'name']]);
$requests->items->get(['hostids' => ['10105'], 'output' => 'extend']);
$requests->triggers->get(['output' => 'extend']);
```

Each request object exposes:

- `method()`: the Zabbix JSON-RPC method name, such as `host.get`
- `params()`: the method params array sent through JSON-RPC

Request builders accept plain arrays or request objects. Prefer arrays for normal application code:

```php
use IntelliTrend\Zabbix\Requests\HostGetRequest;

$request = $requests->hosts->get([
    'hostids' => ['10105'],
    'output' => ['hostid', 'host'],
]);

$sameRequest = HostGetRequest::fromParams([
    'hostids' => ['10105'],
])->output(['hostid', 'host']);

$hosts = $zabbix->request($request);
```
