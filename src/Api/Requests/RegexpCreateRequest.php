<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

/**
 * regexp.create - Create new global regular expressions.
 */
final class RegexpCreateRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'regexp.create';
    }
}
