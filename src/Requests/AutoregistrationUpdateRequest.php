<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * autoregistration.update - Update autoregistration settings. Restricted to users with Super admin status.
 */
final class AutoregistrationUpdateRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'autoregistration.update';
    }
}
