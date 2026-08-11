<?php

declare(strict_types=1);

namespace IntelliTrend\Zabbix\Api;

use IntelliTrend\Zabbix\Requests\TemplatedashboardCreateRequest;
use IntelliTrend\Zabbix\Requests\TemplatedashboardDeleteRequest;
use IntelliTrend\Zabbix\Requests\TemplatedashboardGetRequest;
use IntelliTrend\Zabbix\Requests\TemplatedashboardUpdateRequest;

final class TemplateDashboardApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function create(TemplatedashboardCreateRequest|array $request): TemplatedashboardCreateRequest
    {
        return $this->request(TemplatedashboardCreateRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function delete(TemplatedashboardDeleteRequest|array $request): TemplatedashboardDeleteRequest
    {
        return $this->request(TemplatedashboardDeleteRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(TemplatedashboardGetRequest|array $request = []): TemplatedashboardGetRequest
    {
        return $this->request(TemplatedashboardGetRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function update(TemplatedashboardUpdateRequest|array $request): TemplatedashboardUpdateRequest
    {
        return $this->request(TemplatedashboardUpdateRequest::class, $request);
    }
}
