<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * host.massadd - Simultaneously add multiple related objects to all the given hosts.
 */
final class HostMassaddRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'host.massadd';
    }
}
