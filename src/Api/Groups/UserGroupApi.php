<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Groups;

use Idiot\Zabbix\Request;
use Idiot\Zabbix\Requests\UsergroupCreateRequest;
use Idiot\Zabbix\Requests\UsergroupDeleteRequest;
use Idiot\Zabbix\Requests\UsergroupGetRequest;
use Idiot\Zabbix\Requests\UsergroupUpdateRequest;

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
