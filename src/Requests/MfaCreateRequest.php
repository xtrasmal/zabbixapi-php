<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * mfa.create - Create new MFA methods.
 */
final class MfaCreateRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'mfa.create';
    }
}
