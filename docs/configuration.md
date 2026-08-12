# Configuration

The constructor accepts Zabbix setup options and normal Guzzle request options.

```php
use Idiot\Zabbix\ZabbixApi;

$zabbix = new ZabbixApi(
    options: [
        'url' => 'https://zabbix.example',
        'token' => 'your-zabbix-api-token',
        'verify' => false,
    ]
);
```

Use Guzzle request options only when your application needs transport configuration. The common case is TLS verification with `verify`.

The client always sets the JSON-RPC request body and required JSON-RPC headers itself. Do not use options to override `body`, `http_errors`, `Content-Type`, or `Authorization`.

## TLS Verification

Default behavior verifies TLS certificates and hostnames.

To disable TLS certificate verification:

```php
$zabbix = new ZabbixApi(
    options: [
        'verify' => false,
    ]
);
```

To use a custom CA bundle:

```php
$zabbix = new ZabbixApi(
    options: [
        'verify' => '/path/to/ca-bundle.pem',
    ]
);
```

## Logging

Pass a PSR-3 logger to receive debug-level request and response diagnostics.

```php
$zabbix = new ZabbixApi(
    logger: $logger
);
```
