<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * alert.get - Retrieve alerts according to the given parameters.
 */
final class AlertGetRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'alert.get';
    }
}
