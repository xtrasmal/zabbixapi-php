<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * authentication.update - Update existing authentication settings. Only available to Super admin user type. There is a single, singleton Authentication object (no ID field); pass any subset of its properties to update.
 */
final class AuthenticationUpdateRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'authentication.update';
    }
}
