# Entry point and dispatch

`ZabbixApi` is the canonical entry point for application code. Its API-area properties — `$hosts`, `$hostGroups`, `$items`, and the rest — are `ZabbixApiGroup` dispatchers bound to the same `ZabbixApi` instance at construction; they are not separate doors. `ZabbixApi` dispatches your call to the matching group, which builds the request object; `ZabbixApi` then validates and sends it. Every group call converges on that one execution hub.

```mermaid
flowchart TD
    You["Your code"] -->|"$zabbix->hosts->get([...])"| Api["ZabbixApi — the entry point and hub"]
    Api -->|"dispatches to"| Group["ZabbixApiGroup<br/>builds the request"]
    Api -->|"validates and sends"| Transport["JSON-RPC transport"]
    Transport --> Server[("Zabbix server")]
```

The hub validates each request, sends one with `JsonRpcClient::call()` or several with `JsonRpcClient::batch()`, and maps each response to a result — raising `ZabbixApiException` on a server error. Whether you pass a single `Request` to `request()` or accumulate several with `batch()`, the path is the same.

## The version probe rides along

`ZabbixApi` resolves the Zabbix version once, through `apiinfo.version`. Rather than spend a separate round trip, the hub prepends that probe to the first request it sends, then drops the extra result before returning yours.

```mermaid
sequenceDiagram
    participant You as Your code
    participant Api as ZabbixApi
    participant Z as Zabbix server
    You->>Api: first call
    Note over Api: version not known yet
    Api->>Z: version probe + your request
    Z-->>Api: version + your result
    Note over Api: cache version, drop it
    Api-->>You: your result
```

Every later call skips the probe and sends on its own.

## See also

- [Request validation](validation.md) — the check the hub runs before sending
- [Transport](transport.md) — how the hub's requests reach the server
- [Batching](../batching.md) — the how-to for queuing several calls
