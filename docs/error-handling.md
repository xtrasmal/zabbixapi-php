# Error handling

Transport, client state, and Zabbix JSON-RPC errors are reported as `ZabbixApiException`.

Invalid grouped or batched request params are reported as `InvalidZabbixRequest` before the request is sent.

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

Grouped calls, request objects passed to `request()`, and queued batch calls validate params against the bundled Zabbix schema before transport:

```php
use Idiot\Zabbix\Requests\InvalidZabbixRequest;

try {
    $zabbix->hosts->get(['output' => 123]);
} catch (InvalidZabbixRequest $e) {
    echo $e->getMessage();
}
```

`call()` is the raw method-name escape hatch. Prefer grouped calls when you want local schema validation.

See [RequestFactory and adapters](request-factory.md) and [Schemas and validation](schemas-and-validation.md) for adapter validation details.
