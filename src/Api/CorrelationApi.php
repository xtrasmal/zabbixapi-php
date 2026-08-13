<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api;

use Idiot\Zabbix\Requests\CorrelationCreateRequest;
use Idiot\Zabbix\Requests\CorrelationDeleteRequest;
use Idiot\Zabbix\Requests\CorrelationGetRequest;
use Idiot\Zabbix\Requests\CorrelationUpdateRequest;
use Idiot\Zabbix\Requests\ZabbixRequest;

final class CorrelationApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function create(CorrelationCreateRequest|array $request): ZabbixRequest
    {
        return $this->request(CorrelationCreateRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function delete(CorrelationDeleteRequest|array $request): ZabbixRequest
    {
        return $this->request(CorrelationDeleteRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(CorrelationGetRequest|array $request = []): ZabbixRequest
    {
        return $this->request(CorrelationGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): ZabbixRequest
    {
        return $this->filterRequest(CorrelationGetRequest::class, $filter);
    }

    /** @param array<string, mixed> $request */
    public function update(CorrelationUpdateRequest|array $request): ZabbixRequest
    {
        return $this->request(CorrelationUpdateRequest::class, $request);
    }
}
