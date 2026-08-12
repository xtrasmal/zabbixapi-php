<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * hostprototype.update - Update existing host prototypes.
 */
final class HostprototypeUpdateRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'hostprototype.update';
    }
}
