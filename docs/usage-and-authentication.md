# Usage and authentication

`ZabbixApi::connect()` configures the Zabbix endpoint and optionally stores a bearer token.

```php
use IntelliTrend\Zabbix\ZabbixApi;

$zabbix = (new ZabbixApi())->connect(
    zabUrl: 'https://zabbix.example',
    zabToken: 'your-zabbix-api-token'
);

$hosts = $zabbix->hosts->get([
    'output' => ['hostid', 'host'],
]);
```

`connect()` validates the base URL and optional token, calls `apiinfo.version` once, and returns the same client instance.

## Bearer Tokens

When a bearer token is configured, every authenticated API call sends:

```text
Authorization: Bearer <token>
```

The token is never placed in the JSON-RPC request body.

## `user.login`

Zabbix still ships `user.login` as an official method. This library supports it as a request, not as the primary client setup API.

If a bearer token is already configured, a `user.login` request object is skipped and the existing token is returned:

```php
use IntelliTrend\Zabbix\Requests\UserLoginRequest;

$zabbix = (new ZabbixApi())->connect(
    zabUrl: 'https://zabbix.example',
    zabToken: 'existing-token'
);

$token = $zabbix->request(new UserLoginRequest(
    username: 'Admin',
    password: 'zabbix'
));
```

If no bearer token is configured, `user.login` is sent unauthenticated and the returned token is stored for later calls:

```php
use IntelliTrend\Zabbix\Requests\UserLoginRequest;

$zabbix = (new ZabbixApi())->connect('https://zabbix.example');

$token = $zabbix->request(new UserLoginRequest(
    username: 'Admin',
    password: 'zabbix'
));

$hosts = $zabbix->hosts->get([
    'output' => ['hostid', 'host'],
]);
```

When `userData` is requested, Zabbix returns an object. The client stores `sessionid` as the bearer token and returns the original response array.

## Laravel Singleton

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
            ))->connect(
                zabUrl: (string) $app['config']['idiot-zabbix.server'],
                zabToken: (string) $app['config']['idiot-zabbix.token']
            );
        }
    );
}
```
