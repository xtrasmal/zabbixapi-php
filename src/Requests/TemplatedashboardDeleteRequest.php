<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

final class TemplatedashboardDeleteRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'templatedashboard.delete';
    }
}
