<?php

declare(strict_types=1);

namespace IntelliTrend\Zabbix\Api;

use IntelliTrend\Zabbix\Requests\GraphprototypeCreateRequest;
use IntelliTrend\Zabbix\Requests\GraphprototypeDeleteRequest;
use IntelliTrend\Zabbix\Requests\GraphprototypeGetRequest;
use IntelliTrend\Zabbix\Requests\GraphprototypeUpdateRequest;

final class GraphPrototypeApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function create(GraphprototypeCreateRequest|array $request): GraphprototypeCreateRequest
    {
        return $this->request(GraphprototypeCreateRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function delete(GraphprototypeDeleteRequest|array $request): GraphprototypeDeleteRequest
    {
        return $this->request(GraphprototypeDeleteRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(GraphprototypeGetRequest|array $request = []): GraphprototypeGetRequest
    {
        return $this->request(GraphprototypeGetRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function update(GraphprototypeUpdateRequest|array $request): GraphprototypeUpdateRequest
    {
        return $this->request(GraphprototypeUpdateRequest::class, $request);
    }
}
