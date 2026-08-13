<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

/**
 * hostinterface.create - Create new host interfaces.
 */
final class HostinterfaceCreateRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'hostinterface.create';
    }
}
