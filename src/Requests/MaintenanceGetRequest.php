<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * maintenance.get - Retrieve maintenances according to the given parameters.
 */
final class MaintenanceGetRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'maintenance.get';
    }
}
