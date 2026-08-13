# Client architecture

The client stack is split by responsibility:

- `Idiot\Zabbix\Clients\HttpClient`
- `Idiot\Zabbix\Clients\JsonRpcClient`
- `Idiot\Zabbix\ZabbixApi`
- `Idiot\Zabbix\Api\ZabbixApiGroup`
- `Idiot\Zabbix\Api\ZabbixBatch`
- `Idiot\Zabbix\RequestRegistry`
- `Idiot\Zabbix\Clients\JsonRpcResponse`

## Responsibilities

`HttpClient` owns HTTP transport concerns. It accepts JSON-ready payload arrays, sends JSON bytes through the already configured Guzzle client, and decodes the HTTP response body once.

`JsonRpcClient` owns JSON-RPC request and response concerns. It turns `ZabbixRequest` objects into JSON-RPC 2.0 request bodies, sends those payloads through the injected transport, normalizes decoded JSON-RPC 2.0 response envelopes into `JsonRpcResponse` objects, and reorders batch responses by id. Protocol errors remain response data.

`ZabbixApiOptions` owns Zabbix endpoint/token state configured at construction and resolves the JSON-RPC client. `ZabbixApi` validates request params before transport and delegates transport work. Its public API group properties, such as `$hosts`, `$hostGroups`, `$items`, and `$templates`, are bound dispatchers for normal application code. Construction does not send HTTP; the required `apiinfo.version` call is made once and batched with the first possible request.

`ZabbixApiGroup` binds one request-builder group to a configured `ZabbixApi` instance. It turns `$zabbix->hosts->get([...])` into a request object and immediately sends it.

`ZabbixBatch` accumulates grouped calls for `ZabbixApi::batch()`. Inside a batch callback, `$batch->hosts->get([...])` queues a request instead of sending it; the configured client sends the queued requests through `JsonRpcClient::batch()` and returns result values in queued order.

`RequestRegistry` tracks generated request classes known to the runtime. It exists so schema validation and tests can assert that a `ZabbixRequest` belongs to a generated, supported request class without exposing method-name request construction as public API.

`JsonFileSchemaProvider` loads bundled Zabbix 7.0 JSON schemas from `schemas/7.0` for validation. It receives a `ZabbixRequest`, reads the method from the request object, and rejects requests unknown to `RequestRegistry`. The JSON files are the schema source of truth; generated PHP schema classes are not part of the runtime API.

Generated request-builder objects are private implementation details owned by `ZabbixApi`. They are shared with `ZabbixBatch` so the same grouped method names work in immediate and deferred execution without exposing a separate request API.

Generated request classes stay behind these smaller APIs for normal application code.
