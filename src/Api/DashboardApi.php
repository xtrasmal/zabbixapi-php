<?php

declare(strict_types=1);

namespace IntelliTrend\Zabbix\Api;

use IntelliTrend\Zabbix\Requests\DashboardCreateRequest;
use IntelliTrend\Zabbix\Requests\DashboardDeleteRequest;
use IntelliTrend\Zabbix\Requests\DashboardGetRequest;
use IntelliTrend\Zabbix\Requests\DashboardUpdateRequest;

final class DashboardApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function create(DashboardCreateRequest|array $request): DashboardCreateRequest
    {
        return $this->request(DashboardCreateRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function delete(DashboardDeleteRequest|array $request): DashboardDeleteRequest
    {
        return $this->request(DashboardDeleteRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(DashboardGetRequest|array $request = []): DashboardGetRequest
    {
        return $this->request(DashboardGetRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function update(DashboardUpdateRequest|array $request): DashboardUpdateRequest
    {
        return $this->request(DashboardUpdateRequest::class, $request);
    }
}
