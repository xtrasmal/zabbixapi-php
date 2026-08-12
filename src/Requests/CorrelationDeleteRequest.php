<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

final class CorrelationDeleteRequest extends AbstractZabbixRequest
{
    /** @param list<CorrelationId> $ids */
    public function __construct(array $ids)
    {
        parent::__construct($ids);
    }

    public function method(): string
    {
        return 'correlation.delete';
    }
}
