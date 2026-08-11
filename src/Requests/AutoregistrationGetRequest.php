<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

/**
 * autoregistration.get - Retrieve autoregistration settings. Restricted to users with Super admin status.
 */
final class AutoregistrationGetRequest extends AbstractZabbixRequest
{
    public function __construct(
        public array|string|null $output = null,
    ) {}

    public function method(): string
    {
        return 'autoregistration.get';
    }
}
