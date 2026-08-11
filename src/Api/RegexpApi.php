<?php

declare(strict_types=1);

namespace IntelliTrend\Zabbix\Api;

use IntelliTrend\Zabbix\Requests\RegexpCreateRequest;
use IntelliTrend\Zabbix\Requests\RegexpDeleteRequest;
use IntelliTrend\Zabbix\Requests\RegexpGetRequest;
use IntelliTrend\Zabbix\Requests\RegexpUpdateRequest;

final class RegexpApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function create(RegexpCreateRequest|array $request): RegexpCreateRequest
    {
        return $this->request(RegexpCreateRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function delete(RegexpDeleteRequest|array $request): RegexpDeleteRequest
    {
        return $this->request(RegexpDeleteRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(RegexpGetRequest|array $request = []): RegexpGetRequest
    {
        return $this->request(RegexpGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): RegexpGetRequest
    {
        return $this->filterRequest(RegexpGetRequest::class, $filter);
    }

    /** @param array<string, mixed> $request */
    public function update(RegexpUpdateRequest|array $request): RegexpUpdateRequest
    {
        return $this->request(RegexpUpdateRequest::class, $request);
    }
}
