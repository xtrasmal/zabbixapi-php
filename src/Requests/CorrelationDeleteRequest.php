<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

final class CorrelationDeleteRequest extends AbstractZabbixListRequest
{
    /** @param list<CorrelationId> $ids */
    public function __construct(array $ids)
    {
        parent::__construct($ids);
    }

    public static function method(): string
    {
        return 'correlation.delete';
    }
}
