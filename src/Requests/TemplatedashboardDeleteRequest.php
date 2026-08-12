<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

final class TemplatedashboardDeleteRequest extends AbstractZabbixRequest
{
    /** @param list<TemplatedashboardId> $ids */
    public function __construct(array $ids)
    {
        parent::__construct($ids);
    }

    public function method(): string
    {
        return 'templatedashboard.delete';
    }
}
