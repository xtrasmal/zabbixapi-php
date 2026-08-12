<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * auditlog.get - Retrieve audit log records according to the given parameters. Restricted to Super admin user types (permissions manageable via user role settings).
 */
final class AuditlogGetRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'auditlog.get';
    }
}
