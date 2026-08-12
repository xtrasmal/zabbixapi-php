# Schemas and validation

The bundled schemas live under `schemas/7.0` and describe Zabbix 7.0 API params.

Runtime validation uses `justinrainbow/json-schema` through `JsonSchemaValidator`.

`JsonFileSchemaProvider` loads the JSON schema for a Zabbix method by method name:

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

`RequestFactory::validated()` is still useful for adapters that want to validate method-name input before they hand request objects to `ZabbixApi`:

```php
$request = RequestFactory::validated()->make('host.get', [
    'output' => ['hostid', 'host'],
]);
```

`RequestFactory::plain()` only maps method names to request objects. Passing that request to `$zabbix->request($request)` still validates before transport.

## Request Classes

Generated request classes are method-specific envelopes around params arrays. They expose `method()` and `params()` internally, but application code should not construct them directly.

The public API remains:

```php
$zabbix->hosts->get([...]);
$zabbix->batch(function ($batch): void {
    $batch->hosts->get([...]);
});
```
