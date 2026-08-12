<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * mfa.update - Update existing MFA methods.
 */
final class MfaUpdateRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'mfa.update';
    }
}
