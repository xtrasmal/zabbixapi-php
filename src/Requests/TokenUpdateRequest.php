<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * token.update - Update existing tokens. The tokenid property must be defined for each token; all other properties are optional and only passed properties will be updated.
 */
final class TokenUpdateRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'token.update';
    }
}
