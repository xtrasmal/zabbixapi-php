# API reference

## `ZabbixApi`

### `new ZabbixApi(array $options = [], ?GuzzleHttp\ClientInterface $httpClient = null, ?Psr\Log\LoggerInterface $logger = null)`

Creates a client. `$options` are Guzzle request options. Passing a Guzzle client or PSR-3 logger is useful for tests, custom handlers, or application logging.

### `connect(string $zabUrl, ?string $zabToken = null): self`

Configures the client for a Zabbix server and optional bearer token, verifies the API version, and returns the same client instance.

### `call(string $method, array $params = []): array|bool|float|int|string|null`

Calls a Zabbix API method using an explicit method name and params array.

### `request(IntelliTrend\Zabbix\Requests\ZabbixRequest $request): array|bool|float|int|string|null`

Calls a Zabbix API method from a request object.

### `getApiVersion(): string`

Calls `apiinfo.version` and stores the returned API version.

### `getAuthToken(): string`

Returns the configured bearer token or throws when no token is configured.

### `setLogger(Psr\Log\LoggerInterface $logger): self`

Sets the PSR-3 logger used for debug-level request and response diagnostics.

### `getVersion(): string`

Returns the library version.

## Request Mapping

`StaticRequestRegistry` maps Zabbix method names to generated request classes.

`RequestFactory` is the intended small API for method-name driven request creation.
