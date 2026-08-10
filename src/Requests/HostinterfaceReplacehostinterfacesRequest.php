<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

/**
 * hostinterface.replacehostinterfaces - Replace all host interfaces on a given host.
 */
final class HostinterfaceReplacehostinterfacesRequest extends AbstractZabbixRequest
{
    public function __construct(
        public array $interfaces,
        public string $hostid,
    ) {}

    public static function method(): string
    {
        return 'hostinterface.replacehostinterfaces';
    }
}
