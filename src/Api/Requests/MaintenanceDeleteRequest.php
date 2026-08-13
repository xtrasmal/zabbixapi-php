<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

final class MaintenanceDeleteRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'maintenance.delete';
    }
}
