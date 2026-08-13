<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

/**
 * host.get - Retrieve hosts according to the given parameters.
 */
final class HostGetRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'host.get';
    }
}
