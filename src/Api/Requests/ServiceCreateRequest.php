<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

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
