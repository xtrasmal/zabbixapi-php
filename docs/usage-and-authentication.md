# Usage and authentication

Configure the Zabbix endpoint and bearer token when the client is constructed.

```php
use Idiot\Zabbix\ZabbixApi;

$zabbix = new ZabbixApi([
    'url' => 'https://zabbix.example/api_jsonrpc.php',
    'token' => 'your-zabbix-api-token',
]);

$hosts = $zabbix->hosts->get([
    'output' => ['hostid', 'host'],
]);
```

The constructor validates the JSON-RPC endpoint URL and token and stores the connection state for later calls. It does not send an HTTP request by itself.

The only request the client makes on its own is a one-time `apiinfo.version` probe — see [Entry point and dispatch](architecture/entry-point.md) for how it rides along with your first call.

## Bearer Tokens

Every API call is sent through the client configured by `Options`, including the bearer header:

```text
Authorization: Bearer <token>
```

The token is never placed in the JSON-RPC request body.

## `user.login`

Zabbix still ships `user.login` as an official method, so the generated request remains available when you call it explicitly. This library does not use `user.login` as a credential exchange flow and does not mutate its configured bearer token from a login response.

## `user.logout`

`user.logout` is available as an explicit API call:

```php
$zabbix->users->logout([]);
```

The client does not run a local session lifecycle or automatic logout flow. Logout is just another Zabbix method call when your application chooses to send it.

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

            return new ZabbixApi([
                'url' => (string)$config->get('idiot-zabbix.server'),
                'token' => (string)$config->get('idiot-zabbix.token'),
                'verify' => (bool)$config->get('idiot-zabbix.verify', true),
                'logger' => $app->make(LoggerInterface::class),
            ]);
        }
    );
}
```
