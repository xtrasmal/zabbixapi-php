<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * correlation.create - Create new correlations.
 */
final class CorrelationCreateRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'correlation.create';
    }
}
