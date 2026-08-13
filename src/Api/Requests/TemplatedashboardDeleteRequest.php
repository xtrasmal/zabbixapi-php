<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

final class TemplatedashboardDeleteRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'templatedashboard.delete';
    }
}
