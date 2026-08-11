<?php

declare(strict_types=1);

namespace IntelliTrend\Zabbix\Api;

use IntelliTrend\Zabbix\Requests\MaintenanceCreateRequest;
use IntelliTrend\Zabbix\Requests\MaintenanceDeleteRequest;
use IntelliTrend\Zabbix\Requests\MaintenanceGetRequest;
use IntelliTrend\Zabbix\Requests\MaintenanceUpdateRequest;

final class MaintenanceApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function create(MaintenanceCreateRequest|array $request): MaintenanceCreateRequest
    {
        return $this->request(MaintenanceCreateRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function delete(MaintenanceDeleteRequest|array $request): MaintenanceDeleteRequest
    {
        return $this->request(MaintenanceDeleteRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(MaintenanceGetRequest|array $request = []): MaintenanceGetRequest
    {
        return $this->request(MaintenanceGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): MaintenanceGetRequest
    {
        return $this->filterRequest(MaintenanceGetRequest::class, $filter);
    }

    /** @param array<string, mixed> $request */
    public function update(MaintenanceUpdateRequest|array $request): MaintenanceUpdateRequest
    {
        return $this->request(MaintenanceUpdateRequest::class, $request);
    }
}
