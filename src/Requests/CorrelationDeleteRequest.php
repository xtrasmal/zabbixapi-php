<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

final class CorrelationDeleteRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'correlation.delete';
    }
}
