<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

/**
 * connector.get - Retrieve connectors according to the given parameters.
 */
final class ConnectorGetRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'connector.get';
    }
}
