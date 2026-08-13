# Error handling

Zabbix JSON-RPC errors are reported as `ZabbixApiException` when they are consumed through `ZabbixApi`.

Invalid grouped or batched request params are reported as `InvalidZabbixRequest` before the request is sent.

Zabbix JSON-RPC errors keep the Zabbix error code:

```php
use Idiot\Zabbix\ZabbixApiException;

try {
    $zabbix->hosts->get(['output' => 'extend']);
} catch (ZabbixApiException $e) {
    echo $e->getCode();
    echo $e->getMessage();
}
```

Malformed JSON-RPC responses are represented as JSON-RPC error envelopes by the JSON-RPC client. When those envelopes are consumed through `ZabbixApi`, they are reported as `ZabbixApiException`. Transport and JSON decoding failures are reported by the HTTP layer as native Guzzle or JSON exceptions.

Grouped calls, request objects passed to `request()`, and queued batch calls validate params against the bundled Zabbix schema before transport:

```php
use Idiot\Zabbix\InvalidZabbixRequest;

try {
    $zabbix->hosts->get(['output' => 123]);
} catch (InvalidZabbixRequest $e) {
    echo $e->getMessage();
}
```

See [Schemas and validation](schemas-and-validation.md) for validation details.
