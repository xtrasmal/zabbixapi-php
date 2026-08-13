<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * drule.create - Create new network discovery rules.
 */
final class DruleCreateRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'drule.create';
    }
}
