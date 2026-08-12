<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * report.create - Create new scheduled reports.
 */
final class ReportCreateRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'report.create';
    }
}
