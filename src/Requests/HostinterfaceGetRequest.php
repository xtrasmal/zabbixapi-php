<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * hostinterface.get - Retrieve host interfaces according to the given parameters.
 */
final class HostinterfaceGetRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'hostinterface.get';
    }
}
