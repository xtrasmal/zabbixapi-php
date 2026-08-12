# Client architecture

The client stack is split by responsibility:

- `Idiot\Zabbix\Clients\HttpClient`
- `Idiot\Zabbix\Clients\JsonRpcClient`
- `Idiot\Zabbix\ZabbixApi`
- `Idiot\Zabbix\Api\ZabbixApiGroup`
- `Idiot\Zabbix\Api\ZabbixBatch`
- `Idiot\Zabbix\Api\ZabbixRequestApi`
- `Idiot\Zabbix\Requests\RequestFactory`
- `Idiot\Zabbix\Clients\JsonRpcRequest`
- `Idiot\Zabbix\Clients\JsonRpcResponse`

## Responsibilities

`HttpClient` owns HTTP transport concerns. It encodes JSON-RPC payload arrays, sends JSON bytes through Guzzle, adds JSON-RPC headers, adds the bearer `Authorization` header when provided, and decodes the HTTP response body once.

`JsonRpcClient` owns JSON-RPC envelope concerns. It builds single or batch payload arrays, sends them through the injected transport, validates decoded JSON-RPC 2.0 response envelopes, and reorders batch responses by id.

`ZabbixApi` owns Zabbix endpoint/token state configured at construction, validates request params before transport, and delegates transport work. Its public API group properties, such as `$hosts`, `$hostGroups`, `$items`, and `$templates`, are bound dispatchers for normal application code. Construction does not send HTTP; the required `apiinfo.version` call is made once and batched with the first possible request.

`ZabbixApiGroup` binds one request-builder group to a configured `ZabbixApi` instance. It turns `$zabbix->hosts->get([...])` into a request object and immediately sends it.

`ZabbixBatch` accumulates grouped calls for `ZabbixApi::batch()`. Inside a batch callback, `$batch->hosts->get([...])` queues a request instead of sending it; the configured client sends the queued requests through `JsonRpcClient::batch()` and returns result values in queued order.

`RequestFactory` maps Zabbix method names to request objects and can validate params immediately for adapter input. It exists for method-name driven adapters and tooling, not as the primary application API.

`JsonFileSchemaProvider` loads bundled Zabbix 7.0 JSON schemas from `schemas/7.0` for validation. The JSON files are the schema source of truth; generated PHP schema classes are not part of the runtime API.

`ZabbixRequestApi` contains the internal request-builder facade used by the bound API groups and batch accumulator.

Generated request classes stay behind these smaller APIs for normal application code.
