<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * sla.update - Update existing SLA entries.
 */
final class SlaUpdateRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'sla.update';
    }
}
