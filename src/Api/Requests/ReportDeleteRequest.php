<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

final class ReportDeleteRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'report.delete';
    }
}
