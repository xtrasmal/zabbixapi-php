<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

final class ServiceDeleteRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'service.delete';
    }
}
