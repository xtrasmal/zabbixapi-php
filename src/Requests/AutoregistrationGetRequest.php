<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * autoregistration.get - Retrieve autoregistration settings. Restricted to users with Super admin status.
 */
final class AutoregistrationGetRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'autoregistration.get';
    }
}
