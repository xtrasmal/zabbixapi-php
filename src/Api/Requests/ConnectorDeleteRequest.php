<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

final class ConnectorDeleteRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'connector.delete';
    }
}
