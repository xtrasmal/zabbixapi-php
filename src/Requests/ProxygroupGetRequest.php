<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * proxygroup.get - Retrieve proxy groups according to the given parameters.
 */
final class ProxygroupGetRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'proxygroup.get';
    }
}
