<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

/**
 * proxy.create - Create new proxies.
 */
final class ProxyCreateRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'proxy.create';
    }
}
