<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

/**
 * correlation.update - Update existing correlations.
 */
final class CorrelationUpdateRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'correlation.update';
    }
}
