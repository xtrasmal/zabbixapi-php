<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

final class MaintenanceDeleteRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'maintenance.delete';
    }
}
