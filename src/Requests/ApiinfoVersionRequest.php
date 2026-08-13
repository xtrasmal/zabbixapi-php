<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

final class ApiinfoVersionRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'apiinfo.version';
    }
}
