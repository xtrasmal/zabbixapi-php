<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

final class TokenDeleteRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'token.delete';
    }
}
