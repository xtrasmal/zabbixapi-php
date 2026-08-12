<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * dashboard.create - Create new dashboards.
 */
final class DashboardCreateRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'dashboard.create';
    }
}
