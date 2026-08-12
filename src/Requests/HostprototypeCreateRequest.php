<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * hostprototype.create - Create new host prototypes.
 */
final class HostprototypeCreateRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'hostprototype.create';
    }
}
