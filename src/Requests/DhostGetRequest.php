<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * dhost.get - Retrieve discovered hosts according to the given parameters.
 */
final class DhostGetRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'dhost.get';
    }
}
