# API reference

## `ZabbixApi`

### `new ZabbixApi(array $options = [], ?GuzzleHttp\ClientInterface $httpClient = null, ?Psr\Log\LoggerInterface $logger = null)`

Creates a client. `$options['url']` configures the Zabbix base URL, `$options['token']` configures the bearer token, `$options['username']` and `$options['password']` configure automatic `user.login` fallback, and other options are passed to Guzzle as request options. Passing a Guzzle client or PSR-3 logger is useful for tests, custom handlers, or application logging.

### `call(string $method, array $params = []): array|bool|float|int|string|null`

Calls a Zabbix API method using an explicit method name and params array. Prefer API groups in application code; this method is useful for unsupported methods, debugging, or small adapters.

### `$zabbix->hosts->get(array $params = []): array|bool|float|int|string|null`

Executes a request through a Zabbix API group. The public groups mirror Zabbix API areas, for example `$zabbix->hosts`, `$zabbix->items`, `$zabbix->triggers`, `$zabbix->users`, and `$zabbix->templates`.

```php
$zabbix->hosts->get(['output' => ['hostid', 'host']]);
$zabbix->hostGroups->create(['name' => 'Linux servers']);
$zabbix->items->get(['hostids' => ['10105'], 'output' => 'extend']);
```

### `request(Idiot\Zabbix\Requests\ZabbixRequest $request): array|bool|float|int|string|null`

Calls a Zabbix API method from a request object.

### `requests(): Idiot\Zabbix\Api\ZabbixRequestApi`

Returns the request-builder facade for composing request objects before sending them through `request()`.

### `getApiVersion(): string`

Returns the cached Zabbix API version. If no request has loaded it yet, calls `apiinfo.version` and stores the returned value.

### `getAuthToken(): string`

Returns the configured bearer token. When username/password credentials are configured and no token exists yet, this performs `user.login` once and returns the stored token.

### `setLogger(Psr\Log\LoggerInterface $logger): self`

Sets the PSR-3 logger used for debug-level request and response diagnostics.

### `getVersion(): string`

Returns the library version.

## Request Mapping

`StaticRequestRegistry` maps Zabbix method names to generated request classes for tooling and adapters.

`RequestFactory` creates request objects from method names and params arrays when code already works with method-name strings. It is not the normal developer-facing API; prefer `$zabbix->hosts->get([...])`, `$zabbix->templates->get([...])`, and the other public groups.
