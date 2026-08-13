<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

final class HostDeleteRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'host.delete';
    }
}
