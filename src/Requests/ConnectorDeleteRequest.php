<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

final class ConnectorDeleteRequest extends AbstractZabbixListRequest
{
    /** @param list<ConnectorId> $ids */
    public function __construct(array $ids)
    {
        parent::__construct($ids);
    }

    public function method(): string
    {
        return 'connector.delete';
    }
}
