# Error handling

The library throws `ZabbixApiException`.

Zabbix JSON-RPC errors keep the Zabbix error code:

```php
use Idiot\Zabbix\ZabbixApiException;

try {
    $zabbix->call('host.get', ['bad' => 'params']);
} catch (ZabbixApiException $e) {
    echo $e->getCode();
    echo $e->getMessage();
}
```

Malformed JSON-RPC responses, invalid client state, and transport errors are converted to `ZabbixApiException`.

Method-name driven adapters that use `RequestFactory::validated()` receive request validation errors before the request is sent. Normal grouped calls still return Zabbix JSON-RPC validation errors from the server.

See [RequestFactory and adapters](request-factory.md) and [Schemas and validation](schemas-and-validation.md) for the local validation path.
