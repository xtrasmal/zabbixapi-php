<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

final class TokenDeleteRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'token.delete';
    }
}
