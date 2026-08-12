# Client architecture

The client stack is split by responsibility:

- `IntelliTrend\Zabbix\Clients\HttpClient`
- `IntelliTrend\Zabbix\Clients\JsonRpcClient`
- `IntelliTrend\Zabbix\ZabbixApi`
- `IntelliTrend\Zabbix\Requests\RequestFactory`
- `IntelliTrend\Zabbix\JsonRpc\Request`
- `IntelliTrend\Zabbix\JsonRpc\Response`

## Responsibilities

`HttpClient` owns HTTP transport concerns. It sends JSON-RPC bytes through Guzzle, adds JSON-RPC headers, adds the bearer `Authorization` header when provided, and decodes the HTTP response body once.

`JsonRpcClient` owns JSON-RPC envelope concerns. It encodes JSON-RPC requests and validates decoded JSON-RPC 2.0 response envelopes.

`ZabbixApi` owns Zabbix endpoint/token state and delegates transport work. It is not a request builder.

`RequestFactory` maps Zabbix method names to request objects and can validate params before a request leaves the client.

`src/Api` contains optional facade helpers for discoverable request building. Generated request classes stay behind these smaller APIs for normal application code.
