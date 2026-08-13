<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

final class HostinterfaceDeleteRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'hostinterface.delete';
    }
}
