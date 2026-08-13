<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

/**
 * trend.get - Retrieve trend data according to the given parameters.
 */
final class TrendGetRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'trend.get';
    }
}
