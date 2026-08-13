<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * regexp.get - Retrieve global regular expressions according to the given parameters.
 */
final class RegexpGetRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'regexp.get';
    }
}
