# Configuration

The constructor accepts Guzzle request options.

```php
use IntelliTrend\Zabbix\ZabbixApi;

$zabbix = new ZabbixApi(
    options: [
        'timeout' => 10,
        'connect_timeout' => 3,
        'verify' => false,
        'proxy' => 'http://proxy.example:8080',
    ]
);

$zabbix->connect(
    zabUrl: 'https://zabbix.example',
    zabToken: 'your-zabbix-api-token'
);
```

Useful Guzzle options include:

- `timeout`
- `connect_timeout`
- `verify`
- `cert`
- `ssl_key`
- `proxy`
- `allow_redirects`
- `decode_content`
- `on_stats`

See the official [Guzzle request options documentation](https://docs.guzzlephp.org/en/stable/request-options.html) for the full list.

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
