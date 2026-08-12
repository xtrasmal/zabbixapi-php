<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * proxygroup.update - Update existing proxy groups.
 */
final class ProxygroupUpdateRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'proxygroup.update';
    }
}
