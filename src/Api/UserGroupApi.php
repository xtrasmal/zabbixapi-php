<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api;

use Idiot\Zabbix\Requests\UsergroupCreateRequest;
use Idiot\Zabbix\Requests\UsergroupDeleteRequest;
use Idiot\Zabbix\Requests\UsergroupGetRequest;
use Idiot\Zabbix\Requests\UsergroupUpdateRequest;

final class UserGroupApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function create(UsergroupCreateRequest|array $request): UsergroupCreateRequest
    {
        return $this->request(UsergroupCreateRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function delete(UsergroupDeleteRequest|array $request): UsergroupDeleteRequest
    {
        return $this->request(UsergroupDeleteRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(UsergroupGetRequest|array $request = []): UsergroupGetRequest
    {
        return $this->request(UsergroupGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): UsergroupGetRequest
    {
        return $this->filterRequest(UsergroupGetRequest::class, $filter);
    }

    /** @param array<string, mixed> $request */
    public function update(UsergroupUpdateRequest|array $request): UsergroupUpdateRequest
    {
        return $this->request(UsergroupUpdateRequest::class, $request);
    }
}
