<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

final class MfaDeleteRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'mfa.delete';
    }
}
