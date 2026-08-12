<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * maintenance.update - Update existing maintenances.
 */
final class MaintenanceUpdateRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'maintenance.update';
    }
}
