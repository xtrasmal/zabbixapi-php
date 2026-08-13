<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

/**
 * proxygroup.create - Create new proxy groups.
 */
final class ProxygroupCreateRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'proxygroup.create';
    }
}
