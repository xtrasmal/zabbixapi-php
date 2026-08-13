<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

/**
 * hostprototype.get - Retrieve host prototypes according to the given parameters.
 */
final class HostprototypeGetRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'hostprototype.get';
    }
}
