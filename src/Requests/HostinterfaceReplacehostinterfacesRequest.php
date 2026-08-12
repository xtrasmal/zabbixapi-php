<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * hostinterface.replacehostinterfaces - Replace all host interfaces on a given host.
 */
final class HostinterfaceReplacehostinterfacesRequest extends AbstractZabbixRequest
{
    public function __construct(
        public array $interfaces,
        public string $hostid,
    ) {}

    public function method(): string
    {
        return 'hostinterface.replacehostinterfaces';
    }
}
