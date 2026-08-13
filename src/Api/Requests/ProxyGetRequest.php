<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

/**
 * proxy.get - Retrieve proxies according to the given parameters.
 */
final class ProxyGetRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'proxy.get';
    }
}
