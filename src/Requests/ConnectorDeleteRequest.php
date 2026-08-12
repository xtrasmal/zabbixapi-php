<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

final class ConnectorDeleteRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'connector.delete';
    }
}
