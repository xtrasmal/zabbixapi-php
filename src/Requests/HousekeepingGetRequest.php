<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

/**
 * housekeeping.get - Retrieve housekeeping object according to the given parameters.
 */
final class HousekeepingGetRequest extends AbstractZabbixGetRequest
{
    public function __construct(
        public array|string|null $output = null,
    ) {}

    public function method(): string
    {
        return 'housekeeping.get';
    }
}
