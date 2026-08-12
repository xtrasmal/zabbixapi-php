# Error handling

The library throws `ZabbixApiException`.

Zabbix JSON-RPC errors keep the Zabbix error code:

```php
use IntelliTrend\Zabbix\ZabbixApiException;

try {
    $zabbix->call('host.get', ['bad' => 'params']);
} catch (ZabbixApiException $e) {
    echo $e->getCode();
    echo $e->getMessage();
}
```

Malformed JSON-RPC responses, invalid client state, and transport errors are converted to `ZabbixApiException`.

Request validation errors are raised before the request is sent when using `RequestFactory::validated()`.
