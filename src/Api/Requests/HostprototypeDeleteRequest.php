<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

final class HostprototypeDeleteRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'hostprototype.delete';
    }
}
