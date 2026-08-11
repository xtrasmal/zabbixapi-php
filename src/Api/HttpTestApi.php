<?php

declare(strict_types=1);

namespace IntelliTrend\Zabbix\Api;

use IntelliTrend\Zabbix\Requests\HttptestCreateRequest;
use IntelliTrend\Zabbix\Requests\HttptestDeleteRequest;
use IntelliTrend\Zabbix\Requests\HttptestGetRequest;
use IntelliTrend\Zabbix\Requests\HttptestUpdateRequest;

final class HttpTestApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function create(HttptestCreateRequest|array $request): HttptestCreateRequest
    {
        return $this->request(HttptestCreateRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function delete(HttptestDeleteRequest|array $request): HttptestDeleteRequest
    {
        return $this->request(HttptestDeleteRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(HttptestGetRequest|array $request = []): HttptestGetRequest
    {
        return $this->request(HttptestGetRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function update(HttptestUpdateRequest|array $request): HttptestUpdateRequest
    {
        return $this->request(HttptestUpdateRequest::class, $request);
    }
}
