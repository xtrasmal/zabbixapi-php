<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

/**
 * hostgroup.update - Update existing host groups.
 */
final class HostgroupUpdateRequest extends AbstractZabbixRequest
{
    public function __construct(
        public string $groupid,
        public ?string $name = null,
        public ?string $uuid = null,
    ) {}

    public function method(): string
    {
        return 'hostgroup.update';
    }
}
