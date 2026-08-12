# API groups and filtering

Application code should inject `Idiot\Zabbix\ZabbixApi` and use its public API groups.

```php
use Idiot\Zabbix\ZabbixApi;

final class HostInventory
{
    public function __construct(
        private ZabbixApi $zabbix,
    ) {}

    public function linuxHosts(): array
    {
        return $this->zabbix->hosts->get([
            'filter' => ['host' => ['srv-01', 'srv-02']],
            'output' => ['hostid', 'host', 'name'],
        ]);
    }
}
```

The group name mirrors a Zabbix API area:

```php
$zabbix->hosts->get(['output' => ['hostid', 'host']]);
$zabbix->hostGroups->create(['name' => 'Linux servers']);
$zabbix->templates->get(['output' => ['templateid', 'host']]);
$zabbix->items->get(['hostids' => ['10105'], 'output' => ['itemid', 'name']]);
$zabbix->users->logout([]);
```

Pass the same params array Zabbix documents for the method. The client does not ask you to instantiate generated request classes.

## Filtering

For `get` methods that support Zabbix's `filter` parameter, prefer the full params array when you also need `output`, `select*`, `sortfield`, `limit`, or other options:

```php
$hosts = $zabbix->hosts->get([
    'filter' => ['host' => ['srv-01']],
    'output' => ['hostid', 'host', 'name'],
]);
```

Use the `filter()` shorthand only when the filter is the whole request:

```php
$hosts = $zabbix->hosts->filter([
    'host' => ['srv-01'],
]);
```

The shorthand sends `host.get` with:

```php
[
    'filter' => ['host' => ['srv-01']],
]
```

## Writes

Create, update, delete, and mass operations also accept plain arrays:

```php
$group = $zabbix->hostGroups->create([
    'name' => 'Linux servers',
]);

$zabbix->hosts->update([
    'hostid' => '10105',
    'status' => 1,
]);

$zabbix->hosts->delete(['10105']);
```

List-root methods such as delete calls receive PHP lists because Zabbix expects positional params for those methods.
