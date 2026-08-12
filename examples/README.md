# Examples

These examples assume the package dependencies are installed from the repository root:

```bash
composer install
```

Set connection values with environment variables:

```bash
export ZABBIX_URL="https://zabbix.example"
export ZABBIX_TOKEN="your-zabbix-api-token"
```

Run an example:

```bash
php examples/hosts.php
```

## Files

- `hosts.php`: direct bound API usage with `$zabbix->hosts->get()`
- `host-groups.php`: list host groups through `$zabbix->hostGroups`
- `composed-request.php`: compose a request before dispatching it
- `json-rpc-batch.php`: low-level JSON-RPC 2.0 batch request
- `user-login.php`: automatic `user.login` fallback for installations that still need it
- `laravel/ZabbixPhpProvider.php`: Laravel service provider registration
- `laravel/idiot-zabbix.php`: matching Laravel config shape
