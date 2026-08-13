<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

/**
 * host.update - Update existing hosts.
 */
final class HostUpdateRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'host.update';
    }
}
