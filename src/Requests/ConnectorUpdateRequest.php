<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * connector.update - Update existing connectors. Only the connectorid property is required; only passed properties are updated, the rest remain unchanged.
 */
final class ConnectorUpdateRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'connector.update';
    }
}
