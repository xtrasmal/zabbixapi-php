<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Groups;

use Idiot\Zabbix\Api\Requests\MapCreateRequest;
use Idiot\Zabbix\Api\Requests\MapDeleteRequest;
use Idiot\Zabbix\Api\Requests\MapGetRequest;
use Idiot\Zabbix\Api\Requests\MapUpdateRequest;
use Idiot\Zabbix\Request;

final class MapApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function create(MapCreateRequest|array $request): Request
    {
        return $this->request(MapCreateRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function delete(MapDeleteRequest|array $request): Request
    {
        return $this->request(MapDeleteRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(MapGetRequest|array $request = []): Request
    {
        return $this->request(MapGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): Request
    {
        return $this->filterRequest(MapGetRequest::class, $filter);
    }

    /** @param array<string, mixed> $request */
    public function update(MapUpdateRequest|array $request): Request
    {
        return $this->request(MapUpdateRequest::class, $request);
    }
}
