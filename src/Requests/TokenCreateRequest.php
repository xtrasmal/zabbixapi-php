<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * token.create - Create new tokens. A token created by this method also has to be generated (token.generate) before it is usable.
 */
final class TokenCreateRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'token.create';
    }
}
