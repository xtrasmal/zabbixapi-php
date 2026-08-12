<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

final class GraphDeleteRequest extends AbstractZabbixRequest
{
    /** @param list<GraphId> $ids */
    public function __construct(array $ids)
    {
        parent::__construct($ids);
    }

    public function method(): string
    {
        return 'graph.delete';
    }
}
