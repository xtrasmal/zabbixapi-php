<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

final class ApiinfoVersionRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'apiinfo.version';
    }
}
