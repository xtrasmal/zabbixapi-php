<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

/**
 * mfa.update - Update existing MFA methods.
 */
final class MfaUpdateRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'mfa.update';
    }
}
