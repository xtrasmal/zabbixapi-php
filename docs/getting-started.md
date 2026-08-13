# Getting started

A guided first run. You'll construct the client, read some hosts, then narrow the query — three real calls — and finish knowing where to go next.

You need PHP 8.1+, a reachable Zabbix 7.0 endpoint, and an API token. Install the package first:

```bash
composer require idiot/zabbixapi
```

## Construct the client

```php
use Idiot\Zabbix\ZabbixApi;

$zabbix = new ZabbixApi([
    'url' => 'https://zabbix.example/api_jsonrpc.php',
    'token' => 'your-zabbix-api-token',
]);
```

The constructor validates the URL and token and holds the connection state. Construction sends no HTTP — the first request does.

## Read your first hosts

Each Zabbix API area is a group on the client. Call a method with the plain params array Zabbix documents for it:

```php
$hosts = $zabbix->hosts->get([
    'output' => ['hostid', 'host'],
]);
```

`$hosts` is the decoded Zabbix result. The params are validated against the bundled schema before the request is sent.

## Narrow the results

Add a `filter` to fetch only the hosts you care about:

```php
$hosts = $zabbix->hosts->get([
    'filter' => ['host' => ['srv-01']],
    'output' => ['hostid', 'host', 'name'],
]);
```

That is one guided path. From here, follow the guide that matches your next move.

## Where to next

- The group API in depth — reads, writes, and `get()` vs `filter()` → [API groups and filtering](api-groups.md)
- Several calls in one round trip → [Batching](batching.md)
- Endpoint, timeouts, TLS, logging → [Configuration](configuration.md)
- Catching Zabbix and validation errors → [Error handling](error-handling.md)
