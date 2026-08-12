<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * report.get - Retrieve scheduled reports according to the given parameters.
 */
final class ReportGetRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'report.get';
    }
}
