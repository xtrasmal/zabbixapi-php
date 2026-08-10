<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

/**
 * host.massremove - Remove related objects from multiple hosts.
 */
final class HostMassremoveRequest extends AbstractZabbixRequest
{
    public function __construct(
        public string|array $hostids,
        public string|array|null $groupids = null,
        public ?array $interfaces = null,
        public string|array|null $macros = null,
        public string|array|null $templateids = null,
        public string|array|null $templateids_clear = null,
    ) {}

    public static function method(): string
    {
        return 'host.massremove';
    }
}
