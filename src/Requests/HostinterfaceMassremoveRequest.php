<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

/**
 * hostinterface.massremove - Remove host interfaces from the given hosts.
 */
final class HostinterfaceMassremoveRequest extends AbstractZabbixRequest
{
    public function __construct(
        public array $interfaces,
        public string|array $hostids,
    ) {}

    public function method(): string
    {
        return 'hostinterface.massremove';
    }
}
