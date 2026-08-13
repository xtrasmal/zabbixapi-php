<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

final class ConnectorDeleteRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'connector.delete';
    }
}
