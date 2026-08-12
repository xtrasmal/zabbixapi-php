# Zabbix API PHP Client

PHP client for the Zabbix JSON-RPC API.

This library sends JSON-RPC 2.0 requests to `api_jsonrpc.php` and authenticates API calls with an `Authorization: Bearer <token>` header. No body `auth`, local session cache, or logout flow is used.

## Installation

```bash
composer require intellitrend/zabbixapi
```

Requirements:

- PHP 8.1+
- `ext-curl`
- `ext-openssl`

## Quick Start

```php
use IntelliTrend\Zabbix\ZabbixApi;

$zabbix = (new ZabbixApi())->connect(
    zabUrl: 'https://zabbix.example',
    zabToken: 'your-zabbix-api-token'
);

$hosts = $zabbix->hosts->get([
    'output' => ['hostid', 'host'],
]);
```

## Table of contents

- [Usage and authentication](docs/usage-and-authentication.md)
- [Request building](docs/request-building.md)
- [Configuration](docs/configuration.md)
- [Error handling](docs/error-handling.md)
- [API reference](docs/api-reference.md)
- [Client architecture](docs/client-architecture.md)
- [Changelog](CHANGELOG.md)

## License

This software is licensed under the GNU Lesser General Public License v3.0.
