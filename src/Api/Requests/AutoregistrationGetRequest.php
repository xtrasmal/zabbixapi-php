<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

/**
 * autoregistration.get - Retrieve autoregistration settings. Restricted to users with Super admin status.
 */
final class AutoregistrationGetRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'autoregistration.get';
    }
}
