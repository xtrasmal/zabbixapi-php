<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

final class CorrelationDeleteRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'correlation.delete';
    }
}
