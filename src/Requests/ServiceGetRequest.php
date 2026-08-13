<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * service.get - Retrieve services according to the given parameters.
 */
final class ServiceGetRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'service.get';
    }
}
