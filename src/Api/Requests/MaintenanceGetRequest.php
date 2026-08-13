<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

/**
 * maintenance.get - Retrieve maintenances according to the given parameters.
 */
final class MaintenanceGetRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'maintenance.get';
    }
}
