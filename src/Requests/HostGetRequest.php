<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * host.get - Retrieve hosts according to the given parameters.
 */
final class HostGetRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'host.get';
    }
}
