# Configuration

The constructor accepts a closed set of Zabbix client options. Unknown options fail during construction.

```php
use Idiot\Zabbix\ZabbixApi;

$zabbix = new ZabbixApi([
    'url' => 'https://zabbix.example/api_jsonrpc.php',
    'token' => 'your-zabbix-api-token',
    'verify' => false,
]);
```

Supported options are `url`, `token`, `debug`, `verify`, `timeout`, `connect_timeout`, and `logger`.

The `url` option is the full Zabbix JSON-RPC endpoint, including `api_jsonrpc.php`.

The resolved client always receives the JSON-RPC endpoint, bearer token, fixed JSON-RPC headers, timeout options, TLS verification, and `http_errors` behavior from `Options`. `http_errors` is derived from `debug`.

## TLS Verification

Default behavior verifies TLS certificates and hostnames.

To disable TLS certificate verification:

```php
$zabbix = new ZabbixApi([
    'url' => 'https://zabbix.example/api_jsonrpc.php',
    'token' => 'your-zabbix-api-token',
    'verify' => false,
]);
```

To use a custom CA bundle:

```php
$zabbix = new ZabbixApi([
    'url' => 'https://zabbix.example/api_jsonrpc.php',
    'token' => 'your-zabbix-api-token',
    'verify' => '/path/to/ca-bundle.pem',
]);
```

## Logging

Pass a PSR-3 logger to receive debug-level request and response diagnostics.

```php
$zabbix = new ZabbixApi([
    'url' => 'https://zabbix.example/api_jsonrpc.php',
    'token' => 'your-zabbix-api-token',
    'logger' => $logger,
]);
```
