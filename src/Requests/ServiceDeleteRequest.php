<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

final class ServiceDeleteRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'service.delete';
    }
}
