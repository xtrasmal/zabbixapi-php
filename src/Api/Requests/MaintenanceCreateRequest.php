<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

/**
 * maintenance.create - Create new maintenances.
 */
final class MaintenanceCreateRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'maintenance.create';
    }
}
