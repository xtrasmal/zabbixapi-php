# Zabbix API PHP Client

PHP client for the Zabbix JSON-RPC API with a grouped, array-first public API.

This library sends JSON-RPC 2.0 requests to `api_jsonrpc.php` and authenticates API calls with an `Authorization: Bearer <token>` header. No body `auth` or local session cache is used; `user.logout` is available only as an explicit Zabbix API call.

The intended application API is:

```php
$zabbix->hosts->get([...]);
$zabbix->hostGroups->create([...]);
$zabbix->items->get([...]);
$zabbix->users->logout([]);
$zabbix->batch(function ($batch): void {
    $batch->hosts->get([...]);
    $batch->items->get([...]);
});
```

Generated request classes, bundled schemas, and `RequestFactory` exist for internals and adapter code. Normal controller/service code should use the grouped API with plain arrays.

## Installation

```bash
composer require idiot/zabbixapi
```

Requirements:

- PHP 8.1+
- `ext-curl`
- `ext-openssl`

## Quick Start

```php
use Idiot\Zabbix\ZabbixApi;

$zabbix = new ZabbixApi([
    'url' => 'https://zabbix.example',
    'token' => 'your-zabbix-api-token',
]);

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

$group = $zabbix->hostGroups->create([
    'name' => 'Linux servers',
]);

$results = $zabbix->batch(function ($batch): void {
    $batch->hosts->get([
        'filter' => ['host' => ['srv-01']],
        'output' => ['hostid', 'host'],
    ]);
    $batch->items->get([
        'hostids' => ['10105'],
        'output' => ['itemid', 'name'],
    ]);
});
```

## Common Tasks

### Filter Hosts

Use the full `get()` params array when you want `filter` plus `output` or other Zabbix options:

```php
$hosts = $zabbix->hosts->get([
    'filter' => ['host' => ['srv-01']],
    'output' => ['hostid', 'host', 'name'],
]);
```

Use `filter()` only when the filter is the whole request:

```php
$hosts = $zabbix->hosts->filter([
    'host' => ['srv-01'],
]);
```

### Batch Planned Work

Batch mode is for monitoring workflows where you plan several API moves and then process the ordered results:

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
});

foreach ($results as $result) {
    // Results match the queued calls above.
}
```

Outside `batch()`, grouped calls execute immediately.

## Documentation

- [Usage and authentication](docs/usage-and-authentication.md)
- [API groups and filtering](docs/api-groups.md)
- [Batching](docs/batching.md)
- [Configuration](docs/configuration.md)
- [Error handling](docs/error-handling.md)
- [RequestFactory and adapters](docs/request-factory.md)
- [JSON-RPC client](docs/json-rpc.md)
- [Schemas and validation](docs/schemas-and-validation.md)
- [API reference](docs/api-reference.md)
- [Client architecture](docs/client-architecture.md)
- [Development](docs/development.md)
- [Changelog](CHANGELOG.md)

## License

This software is licensed under the [MIT License](LICENSE).
