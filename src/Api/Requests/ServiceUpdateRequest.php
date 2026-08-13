<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

/**
 * service.update - Update existing services.
 */
final class ServiceUpdateRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'service.update';
    }
}
