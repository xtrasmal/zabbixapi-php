<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Groups;

use Idiot\Zabbix\Api\Requests\ActionCreateRequest;
use Idiot\Zabbix\Api\Requests\ActionDeleteRequest;
use Idiot\Zabbix\Api\Requests\ActionGetRequest;
use Idiot\Zabbix\Api\Requests\ActionUpdateRequest;
use Idiot\Zabbix\Request;

final class ActionApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function create(ActionCreateRequest|array $request): Request
    {
        return $this->request(ActionCreateRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function delete(ActionDeleteRequest|array $request): Request
    {
        return $this->request(ActionDeleteRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(ActionGetRequest|array $request = []): Request
    {
        return $this->request(ActionGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): Request
    {
        return $this->filterRequest(ActionGetRequest::class, $filter);
    }

    /** @param array<string, mixed> $request */
    public function update(ActionUpdateRequest|array $request): Request
    {
        return $this->request(ActionUpdateRequest::class, $request);
    }
}
