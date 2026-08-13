<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

/**
 * dashboard.create - Create new dashboards.
 */
final class DashboardCreateRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'dashboard.create';
    }
}
