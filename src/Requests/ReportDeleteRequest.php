<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

final class ReportDeleteRequest extends AbstractZabbixRequest
{
    /** @param list<ReportId> $ids */
    public function __construct(array $ids)
    {
        parent::__construct($ids);
    }

    public function method(): string
    {
        return 'report.delete';
    }
}
