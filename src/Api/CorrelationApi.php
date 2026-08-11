<?php

declare(strict_types=1);

namespace IntelliTrend\Zabbix\Api;

use IntelliTrend\Zabbix\Requests\CorrelationCreateRequest;
use IntelliTrend\Zabbix\Requests\CorrelationDeleteRequest;
use IntelliTrend\Zabbix\Requests\CorrelationGetRequest;
use IntelliTrend\Zabbix\Requests\CorrelationUpdateRequest;

final class CorrelationApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function create(CorrelationCreateRequest|array $request): CorrelationCreateRequest
    {
        return $this->request(CorrelationCreateRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function delete(CorrelationDeleteRequest|array $request): CorrelationDeleteRequest
    {
        return $this->request(CorrelationDeleteRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(CorrelationGetRequest|array $request = []): CorrelationGetRequest
    {
        return $this->request(CorrelationGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): CorrelationGetRequest
    {
        return $this->filterRequest(CorrelationGetRequest::class, $filter);
    }

    /** @param array<string, mixed> $request */
    public function update(CorrelationUpdateRequest|array $request): CorrelationUpdateRequest
    {
        return $this->request(CorrelationUpdateRequest::class, $request);
    }
}
