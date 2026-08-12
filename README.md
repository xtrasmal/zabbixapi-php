# Zabbix API PHP Client

PHP client for the Zabbix JSON-RPC API.

This library sends JSON-RPC 2.0 requests to `api_jsonrpc.php` and authenticates API calls with an `Authorization: Bearer <token>` header. No body `auth` or local session cache is used; `user.logout` is available only as an explicit Zabbix API call.

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

## Table of contents

- [Usage and authentication](docs/usage-and-authentication.md)
- [Request building](docs/request-building.md)
- [Configuration](docs/configuration.md)
- [Error handling](docs/error-handling.md)
- [API reference](docs/api-reference.md)
- [Client architecture](docs/client-architecture.md)
- [Development](docs/development.md)
- [Changelog](CHANGELOG.md)

## License

This software is licensed under the [MIT License](LICENSE).
