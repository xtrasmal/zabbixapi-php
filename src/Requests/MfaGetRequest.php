<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * mfa.get - Retrieve MFA methods according to the given parameters.
 */
final class MfaGetRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'mfa.get';
    }
}
