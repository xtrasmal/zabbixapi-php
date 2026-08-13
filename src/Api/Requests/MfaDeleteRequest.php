<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

final class MfaDeleteRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'mfa.delete';
    }
}
