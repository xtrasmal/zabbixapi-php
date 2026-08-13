<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

/**
 * regexp.update - Update existing global regular expressions.
 */
final class RegexpUpdateRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'regexp.update';
    }
}
