# Batching

Batching allows you to queue several Zabbix API calls and send them in one HTTP request. The server responds with a list of results, one for each call, in the order they were queued.

All of this is possible because of the [JSON-RPC 2.0 spec](https://www.jsonrpc.org/specification), which Zabbix implements. See [JSON-RPC client](json-rpc.md) for how this library speaks it.

## Batch several calls into one request

Queue the calls inside a callback; each group call joins the batch instead of firing on its own. Reach for this in monitoring workflows that make several moves at once — pull hosts and their items, reconcile, then act.

```php
[$hosts, $items] = $zabbix->batch(function ($batch): void {
    $batch->hosts->get([
        'filter' => ['host' => ['srv-01']],
        'output' => ['hostid', 'host'],
    ]);
    $batch->items->get([
        'hostids' => ['10105'],
        'output' => ['itemid', 'name'],
    ]);
});
```

Inside the callback, a group call queues the request and returns straight away. The same call outside a batch runs on its own — see [API groups and filtering](api-groups.md).

## Results come back in queued order

The client pairs each response to its call by JSON-RPC id, so results land in the order you queued them whatever order the server answers in. Destructure them positionally, as above, or iterate:

```php
$results = $zabbix->batch(function ($batch): void {
    $batch->hosts->get(['output' => ['hostid', 'host']]);
    $batch->items->get(['output' => ['itemid', 'name']]);
});

foreach ($results as $result) {
    // same order as the queued calls
}
```

## One failed call fails the batch

Params are checked before anything leaves the client, so an invalid shape raises `InvalidZabbixRequest` up front. Once sent, if any queued call comes back with a Zabbix error, `batch()` throws `ZabbixApiException` carrying that call's code and message — there are no partial results.

An empty batch never reaches the network:

```php
$zabbix->batch(function (): void {
    // queue nothing
}); // throws ZabbixApiException
```

See [Error handling](error-handling.md) for the exception types and [Schemas and validation](schemas-and-validation.md) for what "checked before sending" covers.

## Passing request objects

The callback form is what application code wants. `batch()` also accepts `Request` objects directly, for internal flows that already hold them:

```php
$zabbix->batch(
    HostGetRequest::fromParams(['output' => ['hostid']]),
    ItemGetRequest::fromParams(['hostids' => ['10105']]),
);
```

## See also

- [Usage and authentication](usage-and-authentication.md) — the batch carries your bearer token like any other call
- [Entry point and dispatch](architecture/entry-point.md) — how the one-time `apiinfo.version` probe rides along with your first batch
