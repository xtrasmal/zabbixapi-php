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

Supported options are `url`, `token`, `debug`, `verify`, `timeout`, `connect_timeout`, and `client`.

The `url` option is the full Zabbix JSON-RPC endpoint, including `api_jsonrpc.php`.

`JsonRpcClient` discovers a PSR-18 client and PSR-17 factories when no `client` is supplied. PSR-18 deliberately has no standard TLS or timeout configuration API, so applications that need to enforce `verify`, `timeout`, or `connect_timeout` must provide a configured PSR-18 client. The Laravel provider included with this repository does this with Guzzle.

## TLS Verification

Default behavior does not verify TLS certificates or hostnames.

To enable TLS certificate verification:

```php
$zabbix = new ZabbixApi([
    'url' => 'https://zabbix.example/api_jsonrpc.php',
    'token' => 'your-zabbix-api-token',
    'verify' => true,
]);
```

To disable TLS certificate verification:

```php
$zabbix = new ZabbixApi([
    'url' => 'https://zabbix.example/api_jsonrpc.php',
    'token' => 'your-zabbix-api-token',
    'verify' => false,
]);
```
