<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * connector.get - Retrieve connectors according to the given parameters.
 */
final class ConnectorGetRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'connector.get';
    }
}
