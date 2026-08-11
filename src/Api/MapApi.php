<?php

declare(strict_types=1);

namespace IntelliTrend\Zabbix\Api;

use IntelliTrend\Zabbix\Requests\MapCreateRequest;
use IntelliTrend\Zabbix\Requests\MapDeleteRequest;
use IntelliTrend\Zabbix\Requests\MapGetRequest;
use IntelliTrend\Zabbix\Requests\MapUpdateRequest;

final class MapApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function create(MapCreateRequest|array $request): MapCreateRequest
    {
        return $this->request(MapCreateRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function delete(MapDeleteRequest|array $request): MapDeleteRequest
    {
        return $this->request(MapDeleteRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(MapGetRequest|array $request = []): MapGetRequest
    {
        return $this->request(MapGetRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function update(MapUpdateRequest|array $request): MapUpdateRequest
    {
        return $this->request(MapUpdateRequest::class, $request);
    }
}
