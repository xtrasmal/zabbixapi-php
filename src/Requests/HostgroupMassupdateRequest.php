<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

/**
 * hostgroup.massupdate - Replace hosts and templates with the specified ones in multiple host groups.
 */
final class HostgroupMassupdateRequest extends AbstractZabbixRequest
{
    public function __construct(
        public array $groups,
        public array $hosts,
    ) {}

    public static function method(): string
    {
        return 'hostgroup.massupdate';
    }
}
