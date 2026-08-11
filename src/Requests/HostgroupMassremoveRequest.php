<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

/**
 * hostgroup.massremove - Remove related objects from multiple host groups.
 */
final class HostgroupMassremoveRequest extends AbstractZabbixRequest
{
    public function __construct(
        public string|array $groupids,
        public string|array|null $hostids = null,
    ) {}

    public function method(): string
    {
        return 'hostgroup.massremove';
    }
}
