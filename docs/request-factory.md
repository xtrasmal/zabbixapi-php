# RequestFactory and adapters

`RequestFactory` is for method-name driven code, not normal application usage.

Prefer this in controllers and services:

```php
$hosts = $zabbix->hosts->get([
    'output' => ['hostid', 'host'],
]);
```

Use `RequestFactory` when code already receives Zabbix method names as strings:

```php
use Idiot\Zabbix\Requests\RequestFactory;

$factory = RequestFactory::validated();

$request = $factory->make('host.get', [
    'output' => ['hostid', 'host'],
    'filter' => ['host' => ['srv-01']],
]);

$hosts = $zabbix->request($request);
```

`RequestFactory::plain()` only maps method names to request objects. `ZabbixApi::request()` still validates that request before transport.

`RequestFactory::validated()` maps method names and validates params against the bundled Zabbix 7.0 JSON schema immediately. Use it when an adapter should reject invalid input before handing a request object to the client.

## Batch Adapters

Request objects can be passed to `batch()` when an adapter already works with method-name strings:

```php
$results = $zabbix->batch(
    $factory->make('host.get', ['output' => ['hostid', 'host']]),
    $factory->make('user.logout', []),
);
```

Do not instantiate generated request classes directly. They are internal params envelopes used by the grouped API, batch accumulator, registry, and validation tooling.
