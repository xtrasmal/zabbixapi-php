<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

final class HttptestDeleteRequest extends AbstractZabbixListRequest
{
    /** @param list<HttptestId> $ids */
    public function __construct(array $ids)
    {
        parent::__construct($ids);
    }

    public function method(): string
    {
        return 'httptest.delete';
    }
}
