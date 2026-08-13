<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Groups;

use Idiot\Zabbix\Api\Requests\UsergroupCreateRequest;
use Idiot\Zabbix\Api\Requests\UsergroupDeleteRequest;
use Idiot\Zabbix\Api\Requests\UsergroupGetRequest;
use Idiot\Zabbix\Api\Requests\UsergroupUpdateRequest;
use Idiot\Zabbix\Request;

final class UserGroupApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function create(UsergroupCreateRequest|array $request): Request
    {
        return $this->request(UsergroupCreateRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function delete(UsergroupDeleteRequest|array $request): Request
    {
        return $this->request(UsergroupDeleteRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(UsergroupGetRequest|array $request = []): Request
    {
        return $this->request(UsergroupGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): Request
    {
        return $this->filterRequest(UsergroupGetRequest::class, $filter);
    }

    /** @param array<string, mixed> $request */
    public function update(UsergroupUpdateRequest|array $request): Request
    {
        return $this->request(UsergroupUpdateRequest::class, $request);
    }
}
