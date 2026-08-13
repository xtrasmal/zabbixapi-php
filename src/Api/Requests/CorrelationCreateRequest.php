<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

/**
 * correlation.create - Create new correlations.
 */
final class CorrelationCreateRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'correlation.create';
    }
}
