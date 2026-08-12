<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * housekeeping.get - Retrieve housekeeping object according to the given parameters.
 */
final class HousekeepingGetRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'housekeeping.get';
    }
}
