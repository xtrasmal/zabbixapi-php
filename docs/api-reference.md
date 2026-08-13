# API reference

The public surface is the `ZabbixApi` client, its API groups, and two exception types. This page lists signatures; the linked guides carry the usage.

## `ZabbixApi`

```php
new ZabbixApi(array $options = [])
```

Constructs the client from a closed option set — `url`, `token`, `debug`, `verify`, `timeout`, `connect_timeout`, `logger`. Unknown options fail at construction. See [Configuration](configuration.md) for each option's behavior.

| Method | Returns | Purpose |
| --- | --- | --- |
| `getApiVersion()` | `string` | The Zabbix server version, sending the one-time `apiinfo.version` probe if it has not run yet. |
| `request(ZabbixRequest $request)` | `mixed` | Send a single request object. Application code uses the API groups instead. |
| `batch(callable\|ZabbixRequest ...$requests)` | `array` | Send several calls in one JSON-RPC batch, results in queued order. See [Batching](batching.md). |

## API groups

Each Zabbix API area is a group property on the client, and each documented method is a call on it:

```php
$zabbix->hosts->get(array $params = []): mixed
```

`$params` is the array Zabbix documents for the method, validated against the bundled schema before transport. The groups mirror the Zabbix 7.0 API. See [API groups and filtering](api-groups.md) for reads, writes, and the `filter()` shorthand.

## Exceptions

Both live in the `Idiot\Zabbix` namespace.

| Exception | Raised when |
| --- | --- |
| `InvalidZabbixRequest` | Params fail schema validation, before anything is sent. |
| `ZabbixApiException` | A Zabbix call returns a JSON-RPC error, or a malformed response is consumed through `ZabbixApi`. |

See [Error handling](error-handling.md) for catching them and [Schemas and validation](schemas-and-validation.md) for what validation covers.

## Version and schema selection

The client resolves the server version once through `apiinfo.version` and uses it to select the bundled schema set that validates params. `Registry` tracks the generated request classes behind the groups — validation infrastructure, not a public request factory. See [Entry point and dispatch](architecture/entry-point.md) for when the probe is sent and [Schemas and validation](schemas-and-validation.md) for how a method maps to its schema.
