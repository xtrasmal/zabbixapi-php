<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

/**
 * hostinterface.massadd - Simultaneously add host interfaces to multiple hosts.
 */
final class HostinterfaceMassaddRequest extends AbstractZabbixRequest
{
    public function __construct(
        public array $interfaces,
        public array $hosts,
    ) {}

    public function method(): string
    {
        return 'hostinterface.massadd';
    }
}
