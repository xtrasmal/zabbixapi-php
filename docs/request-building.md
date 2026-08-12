# Request building

Request building is covered by focused docs:

- [API groups and filtering](api-groups.md)
- [Batching](batching.md)
- [RequestFactory and adapters](request-factory.md)
- [JSON-RPC client](json-rpc.md)
- [Schemas and validation](schemas-and-validation.md)

Normal application code should use grouped calls with plain params arrays:

```php
$hosts = $zabbix->hosts->get([
    'filter' => ['host' => ['srv-01']],
    'output' => ['hostid', 'host'],
]);
```

Use `batch()` when you need deferred execution:

```php
$results = $zabbix->batch(function ($batch): void {
    $batch->hosts->get(['output' => ['hostid', 'host']]);
    $batch->items->get(['output' => ['itemid', 'name']]);
});
```
