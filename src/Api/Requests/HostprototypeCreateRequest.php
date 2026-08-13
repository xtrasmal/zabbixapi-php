<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

/**
 * hostprototype.create - Create new host prototypes.
 */
final class HostprototypeCreateRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'hostprototype.create';
    }
}
