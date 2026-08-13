<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

final class ReportDeleteRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'report.delete';
    }
}
