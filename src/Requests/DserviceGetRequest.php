<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * dservice.get - Retrieve discovered services according to the given parameters.
 */
final class DserviceGetRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'dservice.get';
    }
}
