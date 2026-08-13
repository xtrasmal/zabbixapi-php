<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

/**
 * drule.get - Retrieve network discovery rules according to the given parameters.
 */
final class DruleGetRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'drule.get';
    }
}
