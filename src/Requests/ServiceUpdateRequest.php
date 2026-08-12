<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * service.update - Update existing services.
 */
final class ServiceUpdateRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'service.update';
    }
}
