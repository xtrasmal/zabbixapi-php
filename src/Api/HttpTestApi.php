<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api;

use Idiot\Zabbix\Requests\HttptestCreateRequest;
use Idiot\Zabbix\Requests\HttptestDeleteRequest;
use Idiot\Zabbix\Requests\HttptestGetRequest;
use Idiot\Zabbix\Requests\HttptestUpdateRequest;
use Idiot\Zabbix\Requests\ZabbixRequest;

final class HttpTestApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function create(HttptestCreateRequest|array $request): ZabbixRequest
    {
        return $this->request(HttptestCreateRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function delete(HttptestDeleteRequest|array $request): ZabbixRequest
    {
        return $this->request(HttptestDeleteRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(HttptestGetRequest|array $request = []): ZabbixRequest
    {
        return $this->request(HttptestGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): ZabbixRequest
    {
        return $this->filterRequest(HttptestGetRequest::class, $filter);
    }

    /** @param array<string, mixed> $request */
    public function update(HttptestUpdateRequest|array $request): ZabbixRequest
    {
        return $this->request(HttptestUpdateRequest::class, $request);
    }
}
