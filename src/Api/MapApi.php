<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api;

use Idiot\Zabbix\Requests\MapCreateRequest;
use Idiot\Zabbix\Requests\MapDeleteRequest;
use Idiot\Zabbix\Requests\MapGetRequest;
use Idiot\Zabbix\Requests\MapUpdateRequest;

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

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): MapGetRequest
    {
        return $this->filterRequest(MapGetRequest::class, $filter);
    }

    /** @param array<string, mixed> $request */
    public function update(MapUpdateRequest|array $request): MapUpdateRequest
    {
        return $this->request(MapUpdateRequest::class, $request);
    }
}
