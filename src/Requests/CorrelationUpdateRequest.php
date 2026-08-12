<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * correlation.update - Update existing correlations.
 */
final class CorrelationUpdateRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'correlation.update';
    }
}
