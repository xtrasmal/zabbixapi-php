<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

/**
 * hostprototype.update - Update existing host prototypes.
 */
final class HostprototypeUpdateRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'hostprototype.update';
    }
}
