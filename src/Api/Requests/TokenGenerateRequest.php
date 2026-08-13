<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

final class TokenGenerateRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'token.generate';
    }
}
