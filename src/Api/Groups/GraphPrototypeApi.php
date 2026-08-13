<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Groups;

use Idiot\Zabbix\Api\Requests\GraphprototypeCreateRequest;
use Idiot\Zabbix\Api\Requests\GraphprototypeDeleteRequest;
use Idiot\Zabbix\Api\Requests\GraphprototypeGetRequest;
use Idiot\Zabbix\Api\Requests\GraphprototypeUpdateRequest;
use Idiot\Zabbix\Request;

final class GraphPrototypeApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function create(GraphprototypeCreateRequest|array $request): Request
    {
        return $this->request(GraphprototypeCreateRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function delete(GraphprototypeDeleteRequest|array $request): Request
    {
        return $this->request(GraphprototypeDeleteRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(GraphprototypeGetRequest|array $request = []): Request
    {
        return $this->request(GraphprototypeGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): Request
    {
        return $this->filterRequest(GraphprototypeGetRequest::class, $filter);
    }

    /** @param array<string, mixed> $request */
    public function update(GraphprototypeUpdateRequest|array $request): Request
    {
        return $this->request(GraphprototypeUpdateRequest::class, $request);
    }
}
