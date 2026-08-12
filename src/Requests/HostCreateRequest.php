<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * host.create - Create new hosts.
 */
final class HostCreateRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'host.create';
    }
}
