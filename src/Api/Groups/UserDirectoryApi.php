<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Groups;

use Idiot\Zabbix\Api\Requests\UserdirectoryCreateRequest;
use Idiot\Zabbix\Api\Requests\UserdirectoryDeleteRequest;
use Idiot\Zabbix\Api\Requests\UserdirectoryGetRequest;
use Idiot\Zabbix\Api\Requests\UserdirectoryTestRequest;
use Idiot\Zabbix\Api\Requests\UserdirectoryUpdateRequest;
use Idiot\Zabbix\Request;

final class UserDirectoryApi extends AbstractApi
{
    /** @param list<mixed> $request */
    public function create(UserdirectoryCreateRequest|array $request): Request
    {
        return $this->request(UserdirectoryCreateRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function delete(UserdirectoryDeleteRequest|array $request): Request
    {
        return $this->request(UserdirectoryDeleteRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(UserdirectoryGetRequest|array $request = []): Request
    {
        return $this->request(UserdirectoryGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): Request
    {
        return $this->filterRequest(UserdirectoryGetRequest::class, $filter);
    }

    /** @param array<string, mixed> $request */
    public function test(UserdirectoryTestRequest|array $request): Request
    {
        return $this->request(UserdirectoryTestRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function update(UserdirectoryUpdateRequest|array $request): Request
    {
        return $this->request(UserdirectoryUpdateRequest::class, $request);
    }
}
