<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * service.create - Create new services.
 */
final class ServiceCreateRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'service.create';
    }
}
