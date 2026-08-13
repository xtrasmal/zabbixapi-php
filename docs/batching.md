# Batching

Use `ZabbixApi::batch()` when you want to plan several Zabbix calls and send them as one JSON-RPC batch.

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
    // Result values match the queued calls above.
}
```

Inside the callback, group calls queue requests. Outside the callback, the same calls execute immediately.

## Result Order

JSON-RPC 2.0 allows a server to return batch responses in any order. The client matches responses by JSON-RPC id and returns result values in the order you queued the calls.

```php
[$hosts, $items] = $zabbix->batch(function ($batch): void {
    $batch->hosts->get(['output' => ['hostid', 'host']]);
    $batch->items->get(['output' => ['itemid', 'name']]);
});
```

## Errors

If any queued call returns a Zabbix JSON-RPC error, `batch()` throws `ZabbixApiException` with the Zabbix error code and message.

An empty batch is rejected before HTTP is sent:

```php
$zabbix->batch(function (): void {
});
```

## Authentication

Batches use one HTTP request and the bearer header configured by `ZabbixApiOptions`.

## Explicit Request Objects

Most application code should use the callback form. `batch()` also accepts `ZabbixRequest` objects for internal flows that already hold request objects.
