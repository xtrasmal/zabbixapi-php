<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

final class ApiinfoVersionRequest extends AbstractZabbixRequest
{
    /** @param list<ApiinfoId> $ids */
    public function __construct(array $ids)
    {
        parent::__construct($ids);
    }

    public function method(): string
    {
        return 'apiinfo.version';
    }
}
