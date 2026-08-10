<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

/**
 * hostgroup.create - Create new host groups.
 */
final class HostgroupCreateRequest extends AbstractZabbixRequest
{
    public function __construct(
        public string $name,
        public ?string $uuid = null,
    ) {}

    public static function method(): string
    {
        return 'hostgroup.create';
    }
}
