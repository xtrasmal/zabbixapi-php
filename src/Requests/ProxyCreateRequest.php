<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * proxy.create - Create new proxies.
 */
final class ProxyCreateRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'proxy.create';
    }
}
