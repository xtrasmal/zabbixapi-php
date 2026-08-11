<?php

declare(strict_types=1);

namespace IntelliTrend\Zabbix\Api;

use IntelliTrend\Zabbix\Requests\SlaCreateRequest;
use IntelliTrend\Zabbix\Requests\SlaDeleteRequest;
use IntelliTrend\Zabbix\Requests\SlaGetRequest;
use IntelliTrend\Zabbix\Requests\SlaGetsliRequest;
use IntelliTrend\Zabbix\Requests\SlaUpdateRequest;

final class SlaApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function create(SlaCreateRequest|array $request): SlaCreateRequest
    {
        return $this->request(SlaCreateRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function delete(SlaDeleteRequest|array $request): SlaDeleteRequest
    {
        return $this->request(SlaDeleteRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(SlaGetRequest|array $request = []): SlaGetRequest
    {
        return $this->request(SlaGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): SlaGetRequest
    {
        return $this->filterRequest(SlaGetRequest::class, $filter);
    }

    /** @param array<string, mixed> $request */
    public function getSli(SlaGetsliRequest|array $request): SlaGetsliRequest
    {
        return $this->request(SlaGetsliRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function update(SlaUpdateRequest|array $request): SlaUpdateRequest
    {
        return $this->request(SlaUpdateRequest::class, $request);
    }
}
