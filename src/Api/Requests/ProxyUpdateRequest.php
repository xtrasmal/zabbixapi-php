<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

/**
 * proxy.update - Update existing proxies.
 */
final class ProxyUpdateRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'proxy.update';
    }
}
