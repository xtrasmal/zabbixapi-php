<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

final class TokenGenerateRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'token.generate';
    }
}
