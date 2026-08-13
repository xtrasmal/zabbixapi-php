<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * hostinterface.update - Update existing host interfaces.
 */
final class HostinterfaceUpdateRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'hostinterface.update';
    }
}
