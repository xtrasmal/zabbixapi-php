# Schemas and validation

The bundled schemas live under `schemas/7.0` and describe Zabbix 7.0 API params.

Runtime validation uses `justinrainbow/json-schema` through `JSONSchemaValidator`.

`JSONSchemaProvider` loads the JSON schema for a `Request` by reading the request object's method:

```text
host.get -> schemas/7.0/host/host.get.json
user.logout -> schemas/7.0/user/user.logout.json
```

Generated PHP schema classes are not part of the runtime API.

## Where Validation Runs

Grouped execution validates params locally before transport:

```php
$hosts = $zabbix->hosts->get([
    'output' => ['hostid', 'host'],
]);
```

Batches validate every queued request before sending the JSON-RPC batch:

```php
$zabbix->batch(function ($batch): void {
    $batch->hosts->get(['output' => ['hostid', 'host']]);
    $batch->items->get(['hostids' => ['10105'], 'output' => ['itemid']]);
});
```

## Request Classes

Generated request classes are method-specific envelopes around params arrays. They expose `method()` and `params()` internally, but application code should not construct them directly.

The public API remains:

```php
$zabbix->hosts->get([...]);
$zabbix->batch(function ($batch): void {
    $batch->hosts->get([...]);
});
```
