<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api;

use Idiot\Zabbix\Requests\ModuleCreateRequest;
use Idiot\Zabbix\Requests\ModuleDeleteRequest;
use Idiot\Zabbix\Requests\ModuleGetRequest;
use Idiot\Zabbix\Requests\ModuleUpdateRequest;
use Idiot\Zabbix\Requests\ZabbixRequest;

final class ModuleApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function create(ModuleCreateRequest|array $request): ZabbixRequest
    {
        return $this->request(ModuleCreateRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function delete(ModuleDeleteRequest|array $request): ZabbixRequest
    {
        return $this->request(ModuleDeleteRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(ModuleGetRequest|array $request = []): ZabbixRequest
    {
        return $this->request(ModuleGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): ZabbixRequest
    {
        return $this->filterRequest(ModuleGetRequest::class, $filter);
    }

    /** @param array<string, mixed> $request */
    public function update(ModuleUpdateRequest|array $request): ZabbixRequest
    {
        return $this->request(ModuleUpdateRequest::class, $request);
    }
}
