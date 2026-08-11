<?php

declare(strict_types=1);

namespace IntelliTrend\Zabbix\Api;

use IntelliTrend\Zabbix\Requests\HistoryClearRequest;
use IntelliTrend\Zabbix\Requests\HistoryGetRequest;
use IntelliTrend\Zabbix\Requests\HistoryPushRequest;

final class HistoryApi extends AbstractApi
{
    /** @param list<mixed> $request */
    public function clear(HistoryClearRequest|array $request): HistoryClearRequest
    {
        return $this->request(HistoryClearRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(HistoryGetRequest|array $request = []): HistoryGetRequest
    {
        return $this->request(HistoryGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): HistoryGetRequest
    {
        return $this->filterRequest(HistoryGetRequest::class, $filter);
    }

    /** @param list<mixed> $request */
    public function push(HistoryPushRequest|array $request): HistoryPushRequest
    {
        return $this->request(HistoryPushRequest::class, $request);
    }
}
