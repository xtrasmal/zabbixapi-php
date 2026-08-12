<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

final class ApiinfoVersionRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'apiinfo.version';
    }
}
