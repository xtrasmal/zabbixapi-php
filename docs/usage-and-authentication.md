# Usage and authentication

Configure the Zabbix endpoint and bearer token when the client is constructed.

```php
use Idiot\Zabbix\ZabbixApi;

$zabbix = new ZabbixApi([
    'url' => 'https://zabbix.example',
    'token' => 'your-zabbix-api-token',
]);

$hosts = $zabbix->hosts->get([
    'output' => ['hostid', 'host'],
]);
```

The constructor validates the base URL and optional token and stores the connection state for later calls. It does not send an HTTP request by itself.

The client calls `apiinfo.version` once. When possible, that version probe is batched into the first real Zabbix request instead of being sent as a separate HTTP request.

## Bearer Tokens

When a bearer token is configured, every authenticated API call sends:

```text
Authorization: Bearer <token>
```

The token is never placed in the JSON-RPC request body.

## `user.login`

Zabbix still ships `user.login` as an official method. This library can use it behind the scenes when username/password credentials are configured.

Prefer bearer tokens:

```php
$zabbix = new ZabbixApi([
    'url' => 'https://zabbix.example',
    'token' => 'existing-token',
]);
```

When only username/password credentials are configured, the first authenticated API call sends `user.login` unauthenticated, stores the returned token, and then sends the intended request with a bearer header:

```php
$zabbix = new ZabbixApi([
    'url' => 'https://zabbix.example',
    'username' => 'Admin',
    'password' => 'zabbix',
]);

$hosts = $zabbix->hosts->get([
    'output' => ['hostid', 'host'],
]);
```

If a bearer token is configured, username/password credentials are ignored and `user.login` is not sent.

## Laravel Singleton

```php
use Illuminate\Foundation\Application;
use Idiot\Zabbix\ZabbixApi;
use Psr\Log\LoggerInterface;

public function register(): void
{
    $this->app->singleton(
        abstract: ZabbixApi::class,
        concrete: function (Application $app): ZabbixApi {
            $config = $app['config'];

            return new ZabbixApi(
                options: [
                    'url' => (string)$config->get('idiot-zabbix.server'),
                    'token' => $config->get('idiot-zabbix.token'),
                    'username' => $config->get('idiot-zabbix.username'),
                    'password' => $config->get('idiot-zabbix.password'),
                    'verify' => (bool)$config->get('idiot-zabbix.verify', true),
                ],
                logger: $app->make(LoggerInterface::class)
            );
        }
    );
}
```
