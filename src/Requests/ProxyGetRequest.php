<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * proxy.get - Retrieve proxies according to the given parameters.
 */
final class ProxyGetRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'proxy.get';
    }
}
