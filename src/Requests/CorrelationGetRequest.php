<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * correlation.get - Retrieve correlations according to the given parameters.
 */
final class CorrelationGetRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'correlation.get';
    }
}
