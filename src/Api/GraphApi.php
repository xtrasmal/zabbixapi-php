<?php

declare(strict_types=1);

namespace IntelliTrend\Zabbix\Api;

use IntelliTrend\Zabbix\Requests\GraphCreateRequest;
use IntelliTrend\Zabbix\Requests\GraphDeleteRequest;
use IntelliTrend\Zabbix\Requests\GraphGetRequest;
use IntelliTrend\Zabbix\Requests\GraphUpdateRequest;

final class GraphApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function create(GraphCreateRequest|array $request): GraphCreateRequest
    {
        return $this->request(GraphCreateRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function delete(GraphDeleteRequest|array $request): GraphDeleteRequest
    {
        return $this->request(GraphDeleteRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(GraphGetRequest|array $request = []): GraphGetRequest
    {
        return $this->request(GraphGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): GraphGetRequest
    {
        return $this->filterRequest(GraphGetRequest::class, $filter);
    }

    /** @param array<string, mixed> $request */
    public function update(GraphUpdateRequest|array $request): GraphUpdateRequest
    {
        return $this->request(GraphUpdateRequest::class, $request);
    }
}
