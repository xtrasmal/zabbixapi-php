<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Groups;

use Idiot\Zabbix\Api\Requests\HistoryClearRequest;
use Idiot\Zabbix\Api\Requests\HistoryGetRequest;
use Idiot\Zabbix\Api\Requests\HistoryPushRequest;
use Idiot\Zabbix\Request;

final class HistoryApi extends AbstractApi
{
    /** @param list<mixed> $request */
    public function clear(HistoryClearRequest|array $request): Request
    {
        return $this->request(HistoryClearRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(HistoryGetRequest|array $request = []): Request
    {
        return $this->request(HistoryGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): Request
    {
        return $this->filterRequest(HistoryGetRequest::class, $filter);
    }

    /** @param list<mixed> $request */
    public function push(HistoryPushRequest|array $request): Request
    {
        return $this->request(HistoryPushRequest::class, $request);
    }
}
