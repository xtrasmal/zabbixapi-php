<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api;

use Idiot\Zabbix\Requests\ActionCreateRequest;
use Idiot\Zabbix\Requests\ActionDeleteRequest;
use Idiot\Zabbix\Requests\ActionGetRequest;
use Idiot\Zabbix\Requests\ActionUpdateRequest;
use Idiot\Zabbix\Requests\ZabbixRequest;

final class ActionApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function create(ActionCreateRequest|array $request): ZabbixRequest
    {
        return $this->request(ActionCreateRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function delete(ActionDeleteRequest|array $request): ZabbixRequest
    {
        return $this->request(ActionDeleteRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(ActionGetRequest|array $request = []): ZabbixRequest
    {
        return $this->request(ActionGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): ZabbixRequest
    {
        return $this->filterRequest(ActionGetRequest::class, $filter);
    }

    /** @param array<string, mixed> $request */
    public function update(ActionUpdateRequest|array $request): ZabbixRequest
    {
        return $this->request(ActionUpdateRequest::class, $request);
    }
}
