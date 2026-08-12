<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * host.update - Update existing hosts.
 */
final class HostUpdateRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'host.update';
    }
}
