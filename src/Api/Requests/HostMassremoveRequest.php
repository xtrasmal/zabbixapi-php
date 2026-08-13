<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

/**
 * host.massremove - Remove related objects from multiple hosts.
 */
final class HostMassremoveRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'host.massremove';
    }
}
