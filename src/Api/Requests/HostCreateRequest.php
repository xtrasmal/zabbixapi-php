<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

/**
 * host.create - Create new hosts.
 */
final class HostCreateRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'host.create';
    }
}
