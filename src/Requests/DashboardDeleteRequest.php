<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

final class DashboardDeleteRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'dashboard.delete';
    }
}
