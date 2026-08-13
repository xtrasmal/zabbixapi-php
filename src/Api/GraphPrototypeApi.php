<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api;

use Idiot\Zabbix\Requests\GraphprototypeCreateRequest;
use Idiot\Zabbix\Requests\GraphprototypeDeleteRequest;
use Idiot\Zabbix\Requests\GraphprototypeGetRequest;
use Idiot\Zabbix\Requests\GraphprototypeUpdateRequest;
use Idiot\Zabbix\Requests\ZabbixRequest;

final class GraphPrototypeApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function create(GraphprototypeCreateRequest|array $request): ZabbixRequest
    {
        return $this->request(GraphprototypeCreateRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function delete(GraphprototypeDeleteRequest|array $request): ZabbixRequest
    {
        return $this->request(GraphprototypeDeleteRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(GraphprototypeGetRequest|array $request = []): ZabbixRequest
    {
        return $this->request(GraphprototypeGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): ZabbixRequest
    {
        return $this->filterRequest(GraphprototypeGetRequest::class, $filter);
    }

    /** @param array<string, mixed> $request */
    public function update(GraphprototypeUpdateRequest|array $request): ZabbixRequest
    {
        return $this->request(GraphprototypeUpdateRequest::class, $request);
    }
}
