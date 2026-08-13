<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

/**
 * host.massadd - Simultaneously add multiple related objects to all the given hosts.
 */
final class HostMassaddRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'host.massadd';
    }
}
