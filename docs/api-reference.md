# API reference

## `ZabbixApi`

Create a new `ZabbixApi` instance with the following constructor:

```php
new ZabbixApi(array $options = [])
```

### Supported options

See [Configuration](configuration.md) for supported options.

### Zabbix API groups

We support `$zabbix->hosts->get(array $params = []): mixed` syntax for all Zabbix API's and their methods. The `$params` array is validated against the bundled Zabbix schema. This way you can be sure that your request is valid before it is sent to the Zabbix API.

Availlable groups are dependent on the Zabbix version you are using. Currently we only support Zabbix 7.0.

**Some examples of using the API groups:**

```php
$zabbix->hosts->get(['output' => ['hostid', 'host']]);
$zabbix->hostGroups->create(['name' => 'Linux servers']);
$zabbix->items->get(['hostids' => ['10105'], 'output' => 'extend']);
```

### Batching commands

Use `batch(ZabbixRequest ...$requests): list<mixed>` to send multiple requests in one JSON-RPC batch. The callback receives a batch accumulator whose groups mirror the normal public API; queued params are validated before transport and results return in the same order they were queued.

Example usage:
```php
$results = $zabbix->batch(function ($batch): void {
    $batch->hosts->get([
        'filter' => ['host' => ['srv-01']],
        'output' => ['hostid', 'host'],
    ]);
    $batch->items->get([
        'hostids' => ['10105'],
        'output' => ['itemid', 'name'],
    ]);
});

foreach ($results as $result) {
    // Handle each Zabbix result in queued order.
}
```

## Request Mapping

When ZabbixApi is initialized, the first request is a `apiinfo.version` request to determine the Zabbix version. The version is used to load the correct schema and load the request classes for that version.

`RequestRegistry` tracks the generated request classes known to the runtime. It is infrastructure for schema validation and generated API coverage, not a public method-name request factory.

 See [Schemas and validation](schemas-and-validation.md) for more details.
