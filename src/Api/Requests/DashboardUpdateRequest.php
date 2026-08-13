<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

/**
 * dashboard.update - Update existing dashboards.
 */
final class DashboardUpdateRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'dashboard.update';
    }
}
