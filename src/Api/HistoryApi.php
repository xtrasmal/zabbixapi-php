<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api;

use Idiot\Zabbix\Requests\HistoryClearRequest;
use Idiot\Zabbix\Requests\HistoryGetRequest;
use Idiot\Zabbix\Requests\HistoryPushRequest;
use Idiot\Zabbix\Requests\ZabbixRequest;

final class HistoryApi extends AbstractApi
{
    /** @param list<mixed> $request */
    public function clear(HistoryClearRequest|array $request): ZabbixRequest
    {
        return $this->request(HistoryClearRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(HistoryGetRequest|array $request = []): ZabbixRequest
    {
        return $this->request(HistoryGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): ZabbixRequest
    {
        return $this->filterRequest(HistoryGetRequest::class, $filter);
    }

    /** @param list<mixed> $request */
    public function push(HistoryPushRequest|array $request): ZabbixRequest
    {
        return $this->request(HistoryPushRequest::class, $request);
    }
}
