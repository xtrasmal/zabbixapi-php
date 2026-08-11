<?php

declare(strict_types=1);

namespace IntelliTrend\Zabbix\Api;

use IntelliTrend\Zabbix\Requests\ActionCreateRequest;
use IntelliTrend\Zabbix\Requests\ActionDeleteRequest;
use IntelliTrend\Zabbix\Requests\ActionGetRequest;
use IntelliTrend\Zabbix\Requests\ActionUpdateRequest;

final class ActionApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function create(ActionCreateRequest|array $request): ActionCreateRequest
    {
        return $this->request(ActionCreateRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function delete(ActionDeleteRequest|array $request): ActionDeleteRequest
    {
        return $this->request(ActionDeleteRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(ActionGetRequest|array $request = []): ActionGetRequest
    {
        return $this->request(ActionGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): ActionGetRequest
    {
        return $this->filterRequest(ActionGetRequest::class, $filter);
    }

    /** @param array<string, mixed> $request */
    public function update(ActionUpdateRequest|array $request): ActionUpdateRequest
    {
        return $this->request(ActionUpdateRequest::class, $request);
    }
}
