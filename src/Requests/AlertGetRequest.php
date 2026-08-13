<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * alert.get - Retrieve alerts according to the given parameters.
 */
final class AlertGetRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'alert.get';
    }
}
