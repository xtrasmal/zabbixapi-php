# Zabbix API PHP Client

Token-only PHP client for the Zabbix JSON-RPC API.

This library sends JSON-RPC 2.0 requests to `api_jsonrpc.php` and authenticates Zabbix API calls with an `Authorization: Bearer <token>` header.

It does not support username/password login, session caching, local session files, body `auth`, or logout.

## Installation

```bash
composer require intellitrend/zabbixapi
```

Requirements:

- PHP 8.1+
- `ext-curl`
- `ext-openssl`

## Basic Usage

```php
use IntelliTrend\Zabbix\ZabbixApi;
use IntelliTrend\Zabbix\ZabbixApiException;

$zabbix = new ZabbixApi();

try {
    $zabbix->login(
        zabUrl: 'https://zabbix.example',
        zabToken: 'your-zabbix-api-token'
    );

    $count = $zabbix->call('host.get', [
        'countOutput' => true,
    ]);
} catch (ZabbixApiException $e) {
    echo $e->getMessage();
}
```

`login()` validates the base URL/token, calls `apiinfo.version` once, and returns the configured client instance.

In a Laravel singleton this means the application container performs that setup once. Consumers receive the configured `ZabbixApi` instance and can call API methods without logging in again.

`call()` takes the Zabbix API method name and the JSON-RPC params array.

## Typed Request API

For raw calls, use `ZabbixApi::call()`.

For discoverable request building, use `IntelliTrend\Zabbix\Api\ZabbixRequestApi`. The classes in `src/Api` create typed request objects from `src/Requests`; `ZabbixApi` still executes the request.

```php
use IntelliTrend\Zabbix\Api\ZabbixRequestApi;
use IntelliTrend\Zabbix\ZabbixApi;

$zabbix = (new ZabbixApi())->login(
    zabUrl: 'https://zabbix.example',
    zabToken: 'your-zabbix-api-token'
);

$requests = new ZabbixRequestApi();

$request = $requests
    ->hosts
    ->filter(['host' => ['srv-01', 'srv-22']])
    ->output(['hostid', 'host']);

$hosts = $zabbix->call($request->method(), $request->params());
```

The wrapper groups match Zabbix API areas:

```php
$requests->hosts->get(['output' => ['hostid', 'host']]);
$requests->hosts->byHost('srv-01')->output(['hostid', 'host']);
$requests->hostGroups->get(['output' => ['groupid', 'name']]);
$requests->items->get(['hostids' => ['10105'], 'output' => 'extend']);
$requests->triggers->get(['output' => 'extend']);
```

Each request object exposes:

- `method()`: the Zabbix JSON-RPC method name, such as `host.get`
- `params()`: the method params array passed to `ZabbixApi::call()`

Request builders accept plain arrays or request objects. Prefer arrays for normal application code:

```php
use IntelliTrend\Zabbix\Requests\HostGetRequest;

$request = $requests->hosts->get([
    'hostids' => ['10105'],
    'output' => ['hostid', 'host'],
]);

$sameRequest = HostGetRequest::fromParams([
    'hostids' => ['10105'],
])->output(['hostid', 'host']);

$hosts = $zabbix->call($request->method(), $request->params());
```

## Laravel Registration

```php
use Illuminate\Foundation\Application;
use IntelliTrend\Zabbix\ZabbixApi;
use Psr\Log\LoggerInterface;

public function register(): void
{
    $this->app->singleton(
        abstract: ZabbixApi::class,
        concrete: function (Application $app): ZabbixApi {
            return (new ZabbixApi(
                options: [
                    'verify' => false,
                ],
                logger: $app->make(LoggerInterface::class)
            ))->login(
                zabUrl: (string) $app['config']['idiot-zabbix.server'],
                zabToken: (string) $app['config']['idiot-zabbix.token']
            );
        }
    );
}
```

## Options

The constructor accepts an `options` array. Every entry is a Guzzle request option and is merged over the client defaults:

```php
$zabbix = new ZabbixApi(
    options: [
        'timeout' => 10,
        'connect_timeout' => 3,
        'verify' => false,
        'proxy' => 'http://proxy.example:8080',
    ]
);

$zabbix->login(
    zabUrl: 'https://zabbix.example',
    zabToken: 'your-zabbix-api-token'
);
```

Useful Guzzle options include:

- `timeout`
- `connect_timeout`
- `verify`
- `cert`
- `ssl_key`
- `proxy`
- `allow_redirects`
- `decode_content`
- `on_stats`

See the official [Guzzle request options documentation](https://docs.guzzlephp.org/en/stable/request-options.html) for the full list.

The client always sets the JSON-RPC request body and required JSON-RPC headers itself. Do not use options to override `body`, `http_errors`, `Content-Type`, or `Authorization`.

## SSL Verification

Default behavior verifies TLS certificates and hostnames.

To disable TLS certificate verification:

```php
$zabbix = new ZabbixApi(
    options: [
        'verify' => false,
    ]
);

$zabbix->login(
    zabUrl: 'https://zabbix.example',
    zabToken: 'your-zabbix-api-token'
);
```

To use a custom CA bundle:

```php
$zabbix = new ZabbixApi(
    options: [
        'verify' => '/path/to/ca-bundle.pem',
    ]
);

$zabbix->login(
    zabUrl: 'https://zabbix.example',
    zabToken: 'your-zabbix-api-token'
);
```

## Error Handling

The library throws `ZabbixApiException`.

Zabbix JSON-RPC errors keep the Zabbix error code:

```php
try {
    $zabbix->call('host.get', ['bad' => 'params']);
} catch (ZabbixApiException $e) {
    echo $e->getCode();
    echo $e->getMessage();
}
```

Malformed JSON-RPC responses, invalid client state, and transport errors are converted to `ZabbixApiException`.

## API

### `new ZabbixApi(array $options = [], ?GuzzleHttp\ClientInterface $httpClient = null, ?Psr\Log\LoggerInterface $logger = null)`

Creates a client. `$options` are Guzzle request options. Passing a Guzzle client or PSR-3 logger is optional and mainly useful for tests, custom handlers, or application logging.

### `login(string $zabUrl, string $zabToken): self`

Configures the client for a Zabbix server and bearer token, verifies the API version, and returns the same client instance.

### `call(string $method, array $params = []): array|bool|float|int|string|null`

Calls a Zabbix API method.

### `getApiVersion(): string`

Calls `apiinfo.version` and stores the returned API version.

### `getAuthToken(): string`

Returns the configured API token or throws when the client is not logged in.

### `setLogger(Psr\Log\LoggerInterface $logger): self`

Sets the PSR-3 logger used for debug-level request and response diagnostics.

### `getVersion(): string`

Returns the library version.

## Client Stack

The client stack is split by responsibility:

- `IntelliTrend\Zabbix\Clients\HttpClient`
- `IntelliTrend\Zabbix\Clients\JsonRpcClient`
- `IntelliTrend\Zabbix\JsonRpc\Request`
- `IntelliTrend\Zabbix\JsonRpc\Response`

`HttpClient` is the transport and decodes HTTP response bodies once. `JsonRpcClient` is constructed with that transport; it encodes JSON-RPC requests, sends them through the transport, and validates decoded JSON-RPC 2.0 response envelopes.

## License

This software is licensed under the GNU Lesser General Public License v3.0.

See [CHANGELOG.md](CHANGELOG.md).
