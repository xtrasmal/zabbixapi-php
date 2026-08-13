<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

/**
 * maintenance.update - Update existing maintenances.
 */
final class MaintenanceUpdateRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'maintenance.update';
    }
}
