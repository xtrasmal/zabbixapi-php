<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api;

use Idiot\Zabbix\Requests\ValuemapCreateRequest;
use Idiot\Zabbix\Requests\ValuemapDeleteRequest;
use Idiot\Zabbix\Requests\ValuemapGetRequest;
use Idiot\Zabbix\Requests\ValuemapUpdateRequest;
use Idiot\Zabbix\Requests\ZabbixRequest;

final class ValueMapApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function create(ValuemapCreateRequest|array $request): ZabbixRequest
    {
        return $this->request(ValuemapCreateRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function delete(ValuemapDeleteRequest|array $request): ZabbixRequest
    {
        return $this->request(ValuemapDeleteRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(ValuemapGetRequest|array $request = []): ZabbixRequest
    {
        return $this->request(ValuemapGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): ZabbixRequest
    {
        return $this->filterRequest(ValuemapGetRequest::class, $filter);
    }

    /** @param array<string, mixed> $request */
    public function update(ValuemapUpdateRequest|array $request): ZabbixRequest
    {
        return $this->request(ValuemapUpdateRequest::class, $request);
    }
}
