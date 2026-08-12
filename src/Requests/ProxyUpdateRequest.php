<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * proxy.update - Update existing proxies.
 */
final class ProxyUpdateRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'proxy.update';
    }
}
