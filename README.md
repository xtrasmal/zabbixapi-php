# Zabbix API PHP Client

A PHP client for the Zabbix 7.0 JSON-RPC API. Talk to your server with grouped, array-first calls — `$zabbix->hosts->get([...])` — and let the client handle JSON-RPC, auth, and validation.

## Contents

- [Installation](#installation)
- [Quickstart](#quickstart)
- [Documentation](#documentation)
- [Zabbix manual](#zabbix-manual)

## Installation

```bash
composer require idiot/zabbixapi
```

Requires PHP 8.1+ with `ext-curl` and `ext-openssl`.

## Quickstart

```php
use Idiot\Zabbix\ZabbixApi;

$zabbix = new ZabbixApi([
    'url' => 'https://zabbix.example/api_jsonrpc.php',
    'token' => 'your-zabbix-api-token',
]);

$hosts = $zabbix->hosts->get([
    'output' => ['hostid', 'host'],
]);
```

New here? [Getting started](docs/getting-started.md) walks you from an empty file to your first three calls.

## Documentation

**Start here**

- [Getting started](docs/getting-started.md) — a guided first run

**Guides**

- [API groups and filtering](docs/api-groups.md) — the group API, `get()` vs `filter()`, reads and writes
- [Batching](docs/batching.md) — several calls in one HTTP round trip
- [Configuration](docs/configuration.md) — endpoint, timeouts, TLS, logging
- [Error handling](docs/error-handling.md) — the exception types and when they surface
- [Usage and authentication](docs/usage-and-authentication.md) — the bearer-token model and Laravel wiring

**Reference and internals**

- [API reference](docs/api-reference.md) — groups, methods, and exceptions
- [Architecture](docs/architecture.md) — the layered stack and its sub-systems
- [JSON-RPC client](docs/json-rpc.md) — how the library speaks JSON-RPC 2.0
- [Schemas and validation](docs/schemas-and-validation.md) — the bundled schemas and what they check
- [Development](docs/development.md) — building, testing, and contributing

- [Changelog](CHANGELOG.md)

## Zabbix manual

Official Zabbix 7.0 documentation for the API this client speaks to:

- [Zabbix 7.0 manual](https://www.zabbix.com/documentation/7.0/en/manual)
- [API chapter](https://www.zabbix.com/documentation/7.0/en/manual/api) — the JSON-RPC request/response format and authentication
- [API method reference](https://www.zabbix.com/documentation/7.0/en/manual/api/reference) — per-object methods, params, and return values

## License

This software is licensed under the [MIT License](LICENSE).
