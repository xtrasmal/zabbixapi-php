<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

/**
 * report.update - Update existing scheduled reports.
 */
final class ReportUpdateRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'report.update';
    }
}
