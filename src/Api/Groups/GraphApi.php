<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Groups;

use Idiot\Zabbix\Request;
use Idiot\Zabbix\Requests\GraphCreateRequest;
use Idiot\Zabbix\Requests\GraphDeleteRequest;
use Idiot\Zabbix\Requests\GraphGetRequest;
use Idiot\Zabbix\Requests\GraphUpdateRequest;

final class GraphApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function create(GraphCreateRequest|array $request): Request
    {
        return $this->request(GraphCreateRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function delete(GraphDeleteRequest|array $request): Request
    {
        return $this->request(GraphDeleteRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(GraphGetRequest|array $request = []): Request
    {
        return $this->request(GraphGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): Request
    {
        return $this->filterRequest(GraphGetRequest::class, $filter);
    }

    /** @param array<string, mixed> $request */
    public function update(GraphUpdateRequest|array $request): Request
    {
        return $this->request(GraphUpdateRequest::class, $request);
    }
}
