<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

/**
 * hostinterface.massadd - Simultaneously add host interfaces to multiple hosts.
 */
final class HostinterfaceMassaddRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'hostinterface.massadd';
    }
}
