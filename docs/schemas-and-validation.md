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

`RequestFactory::validated()` validates params locally before the request is sent:

```php
$request = RequestFactory::validated()->make('host.get', [
    'output' => ['hostid', 'host'],
]);
```

Normal grouped calls send plain arrays to Zabbix:

```php
$hosts = $zabbix->hosts->get([
    'output' => ['hostid', 'host'],
]);
```

If Zabbix rejects grouped-call params, the server's JSON-RPC error is returned as `ZabbixApiException`.

## Request Classes

Generated request classes are method-specific envelopes around params arrays. They expose `method()` and `params()` internally, but application code should not construct them directly.

The public API remains:

```php
$zabbix->hosts->get([...]);
$zabbix->batch(function ($batch): void {
    $batch->hosts->get([...]);
});
```
