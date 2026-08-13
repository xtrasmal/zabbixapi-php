<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

/**
 * templatedashboard.update - Update existing template dashboards.
 */
final class TemplatedashboardUpdateRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'templatedashboard.update';
    }
}
