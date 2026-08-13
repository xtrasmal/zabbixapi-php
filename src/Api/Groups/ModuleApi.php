<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Groups;

use Idiot\Zabbix\Api\Requests\ModuleCreateRequest;
use Idiot\Zabbix\Api\Requests\ModuleDeleteRequest;
use Idiot\Zabbix\Api\Requests\ModuleGetRequest;
use Idiot\Zabbix\Api\Requests\ModuleUpdateRequest;
use Idiot\Zabbix\Request;

final class ModuleApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function create(ModuleCreateRequest|array $request): Request
    {
        return $this->request(ModuleCreateRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function delete(ModuleDeleteRequest|array $request): Request
    {
        return $this->request(ModuleDeleteRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(ModuleGetRequest|array $request = []): Request
    {
        return $this->request(ModuleGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): Request
    {
        return $this->filterRequest(ModuleGetRequest::class, $filter);
    }

    /** @param array<string, mixed> $request */
    public function update(ModuleUpdateRequest|array $request): Request
    {
        return $this->request(ModuleUpdateRequest::class, $request);
    }
}
