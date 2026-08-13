<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

/**
 * proxygroup.get - Retrieve proxy groups according to the given parameters.
 */
final class ProxygroupGetRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'proxygroup.get';
    }
}
