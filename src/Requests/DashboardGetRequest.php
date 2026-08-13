<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * dashboard.get - Retrieve dashboards according to the given parameters.
 */
final class DashboardGetRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'dashboard.get';
    }
}
