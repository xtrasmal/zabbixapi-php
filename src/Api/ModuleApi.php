<?php

declare(strict_types=1);

namespace IntelliTrend\Zabbix\Api;

use IntelliTrend\Zabbix\Requests\ModuleCreateRequest;
use IntelliTrend\Zabbix\Requests\ModuleDeleteRequest;
use IntelliTrend\Zabbix\Requests\ModuleGetRequest;
use IntelliTrend\Zabbix\Requests\ModuleUpdateRequest;

final class ModuleApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function create(ModuleCreateRequest|array $request): ModuleCreateRequest
    {
        return $this->request(ModuleCreateRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function delete(ModuleDeleteRequest|array $request): ModuleDeleteRequest
    {
        return $this->request(ModuleDeleteRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(ModuleGetRequest|array $request = []): ModuleGetRequest
    {
        return $this->request(ModuleGetRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function update(ModuleUpdateRequest|array $request): ModuleUpdateRequest
    {
        return $this->request(ModuleUpdateRequest::class, $request);
    }
}
