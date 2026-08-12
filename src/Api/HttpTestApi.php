<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api;

use Idiot\Zabbix\Requests\HttptestCreateRequest;
use Idiot\Zabbix\Requests\HttptestDeleteRequest;
use Idiot\Zabbix\Requests\HttptestGetRequest;
use Idiot\Zabbix\Requests\HttptestUpdateRequest;

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

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): HttptestGetRequest
    {
        return $this->filterRequest(HttptestGetRequest::class, $filter);
    }

    /** @param array<string, mixed> $request */
    public function update(HttptestUpdateRequest|array $request): HttptestUpdateRequest
    {
        return $this->request(HttptestUpdateRequest::class, $request);
    }
}
