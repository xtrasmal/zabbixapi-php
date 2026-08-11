<?php

declare(strict_types=1);

namespace IntelliTrend\Zabbix\Api;

use IntelliTrend\Zabbix\Requests\ValuemapCreateRequest;
use IntelliTrend\Zabbix\Requests\ValuemapDeleteRequest;
use IntelliTrend\Zabbix\Requests\ValuemapGetRequest;
use IntelliTrend\Zabbix\Requests\ValuemapUpdateRequest;

final class ValueMapApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function create(ValuemapCreateRequest|array $request): ValuemapCreateRequest
    {
        return $this->request(ValuemapCreateRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function delete(ValuemapDeleteRequest|array $request): ValuemapDeleteRequest
    {
        return $this->request(ValuemapDeleteRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(ValuemapGetRequest|array $request = []): ValuemapGetRequest
    {
        return $this->request(ValuemapGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): ValuemapGetRequest
    {
        return $this->filterRequest(ValuemapGetRequest::class, $filter);
    }

    /** @param array<string, mixed> $request */
    public function update(ValuemapUpdateRequest|array $request): ValuemapUpdateRequest
    {
        return $this->request(ValuemapUpdateRequest::class, $request);
    }
}
