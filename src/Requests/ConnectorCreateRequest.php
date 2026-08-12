<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * connector.create - Create new connectors.
 */
final class ConnectorCreateRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'connector.create';
    }
}
