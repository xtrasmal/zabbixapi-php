# Client architecture

The client stack is split by responsibility:

- `Idiot\Zabbix\Clients\HttpClient`
- `Idiot\Zabbix\Clients\JsonRpcClient`
- `Idiot\Zabbix\ZabbixApi`
- `Idiot\Zabbix\Api\ZabbixApiGroup`
- `Idiot\Zabbix\Api\ZabbixRequestApi`
- `Idiot\Zabbix\Requests\RequestFactory`
- `Idiot\Zabbix\JsonRpc\Request`
- `Idiot\Zabbix\JsonRpc\Response`

## Responsibilities

`HttpClient` owns HTTP transport concerns. It sends JSON-RPC bytes through Guzzle, adds JSON-RPC headers, adds the bearer `Authorization` header when provided, and decodes the HTTP response body once.

`JsonRpcClient` owns JSON-RPC envelope concerns. It encodes JSON-RPC requests, sends single or batch payloads through the injected transport, validates decoded JSON-RPC 2.0 response envelopes, and reorders batch responses by id.

`ZabbixApi` owns Zabbix endpoint/token state configured at construction and delegates transport work. Its public API group properties, such as `$hosts`, `$hostGroups`, `$items`, and `$templates`, are bound dispatchers for normal application code. Construction does not send HTTP; the required `apiinfo.version` call is made once and batched with the first possible request.

`ZabbixApiGroup` binds one request-builder group to a configured `ZabbixApi` instance. It turns `$zabbix->hosts->get([...])` into a request object and immediately sends it.

`RequestFactory` maps Zabbix method names to request objects and can validate params before a request leaves the client. It exists for method-name driven adapters and tooling, not as the primary application API.

`JsonFileSchemaProvider` loads bundled Zabbix 7.0 JSON schemas from `schemas/7.0` for validation. The JSON files are the schema source of truth; generated PHP schema classes are not part of the runtime API.

`ZabbixRequestApi` contains the unbound request-builder facade. Use `$zabbix->requests()` when you want to compose a request before dispatching it.

Generated request classes stay behind these smaller APIs for normal application code.
