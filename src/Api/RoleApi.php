<?php

declare(strict_types=1);

namespace IntelliTrend\Zabbix\Api;

use IntelliTrend\Zabbix\Requests\RoleCreateRequest;
use IntelliTrend\Zabbix\Requests\RoleDeleteRequest;
use IntelliTrend\Zabbix\Requests\RoleGetRequest;
use IntelliTrend\Zabbix\Requests\RoleUpdateRequest;

final class RoleApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function create(RoleCreateRequest|array $request): RoleCreateRequest
    {
        return $this->request(RoleCreateRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function delete(RoleDeleteRequest|array $request): RoleDeleteRequest
    {
        return $this->request(RoleDeleteRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(RoleGetRequest|array $request = []): RoleGetRequest
    {
        return $this->request(RoleGetRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function update(RoleUpdateRequest|array $request): RoleUpdateRequest
    {
        return $this->request(RoleUpdateRequest::class, $request);
    }
}
