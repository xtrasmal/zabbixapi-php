<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Groups;

use Idiot\Zabbix\Request;
use Idiot\Zabbix\Requests\RoleCreateRequest;
use Idiot\Zabbix\Requests\RoleDeleteRequest;
use Idiot\Zabbix\Requests\RoleGetRequest;
use Idiot\Zabbix\Requests\RoleUpdateRequest;

final class RoleApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function create(RoleCreateRequest|array $request): Request
    {
        return $this->request(RoleCreateRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function delete(RoleDeleteRequest|array $request): Request
    {
        return $this->request(RoleDeleteRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(RoleGetRequest|array $request = []): Request
    {
        return $this->request(RoleGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): Request
    {
        return $this->filterRequest(RoleGetRequest::class, $filter);
    }

    /** @param array<string, mixed> $request */
    public function update(RoleUpdateRequest|array $request): Request
    {
        return $this->request(RoleUpdateRequest::class, $request);
    }
}
