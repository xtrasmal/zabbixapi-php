<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * hostinterface.massadd - Simultaneously add host interfaces to multiple hosts.
 */
final class HostinterfaceMassaddRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'hostinterface.massadd';
    }
}
