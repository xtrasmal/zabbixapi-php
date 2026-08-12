<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * token.get - Retrieve tokens according to the given parameters.
 */
final class TokenGetRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'token.get';
    }
}
