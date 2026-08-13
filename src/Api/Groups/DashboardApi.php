<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Groups;

use Idiot\Zabbix\Api\Requests\DashboardCreateRequest;
use Idiot\Zabbix\Api\Requests\DashboardDeleteRequest;
use Idiot\Zabbix\Api\Requests\DashboardGetRequest;
use Idiot\Zabbix\Api\Requests\DashboardUpdateRequest;
use Idiot\Zabbix\Request;

final class DashboardApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function create(DashboardCreateRequest|array $request): Request
    {
        return $this->request(DashboardCreateRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function delete(DashboardDeleteRequest|array $request): Request
    {
        return $this->request(DashboardDeleteRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(DashboardGetRequest|array $request = []): Request
    {
        return $this->request(DashboardGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): Request
    {
        return $this->filterRequest(DashboardGetRequest::class, $filter);
    }

    /** @param array<string, mixed> $request */
    public function update(DashboardUpdateRequest|array $request): Request
    {
        return $this->request(DashboardUpdateRequest::class, $request);
    }
}
