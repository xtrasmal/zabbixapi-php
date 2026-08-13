<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Groups;

use Idiot\Zabbix\Request;
use Idiot\Zabbix\Requests\MaintenanceCreateRequest;
use Idiot\Zabbix\Requests\MaintenanceDeleteRequest;
use Idiot\Zabbix\Requests\MaintenanceGetRequest;
use Idiot\Zabbix\Requests\MaintenanceUpdateRequest;

final class MaintenanceApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function create(MaintenanceCreateRequest|array $request): Request
    {
        return $this->request(MaintenanceCreateRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function delete(MaintenanceDeleteRequest|array $request): Request
    {
        return $this->request(MaintenanceDeleteRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(MaintenanceGetRequest|array $request = []): Request
    {
        return $this->request(MaintenanceGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): Request
    {
        return $this->filterRequest(MaintenanceGetRequest::class, $filter);
    }

    /** @param array<string, mixed> $request */
    public function update(MaintenanceUpdateRequest|array $request): Request
    {
        return $this->request(MaintenanceUpdateRequest::class, $request);
    }
}
