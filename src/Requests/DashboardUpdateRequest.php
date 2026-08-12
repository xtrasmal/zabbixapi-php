<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * dashboard.update - Update existing dashboards.
 */
final class DashboardUpdateRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'dashboard.update';
    }
}
