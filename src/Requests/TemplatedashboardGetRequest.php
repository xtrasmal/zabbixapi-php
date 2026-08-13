<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * templatedashboard.get - Retrieve template dashboards according to the given parameters.
 */
final class TemplatedashboardGetRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'templatedashboard.get';
    }
}
