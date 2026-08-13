<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

/**
 * templatedashboard.create - Create new template dashboards.
 */
final class TemplatedashboardCreateRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'templatedashboard.create';
    }
}
