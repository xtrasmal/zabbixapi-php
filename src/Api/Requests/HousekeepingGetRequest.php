<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

/**
 * housekeeping.get - Retrieve housekeeping object according to the given parameters.
 */
final class HousekeepingGetRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'housekeeping.get';
    }
}
