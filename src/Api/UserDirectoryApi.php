<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api;

use Idiot\Zabbix\Requests\UserdirectoryCreateRequest;
use Idiot\Zabbix\Requests\UserdirectoryDeleteRequest;
use Idiot\Zabbix\Requests\UserdirectoryGetRequest;
use Idiot\Zabbix\Requests\UserdirectoryTestRequest;
use Idiot\Zabbix\Requests\UserdirectoryUpdateRequest;

final class UserDirectoryApi extends AbstractApi
{
    /** @param list<mixed> $request */
    public function create(UserdirectoryCreateRequest|array $request): UserdirectoryCreateRequest
    {
        return $this->request(UserdirectoryCreateRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function delete(UserdirectoryDeleteRequest|array $request): UserdirectoryDeleteRequest
    {
        return $this->request(UserdirectoryDeleteRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(UserdirectoryGetRequest|array $request = []): UserdirectoryGetRequest
    {
        return $this->request(UserdirectoryGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): UserdirectoryGetRequest
    {
        return $this->filterRequest(UserdirectoryGetRequest::class, $filter);
    }

    /** @param array<string, mixed> $request */
    public function test(UserdirectoryTestRequest|array $request): UserdirectoryTestRequest
    {
        return $this->request(UserdirectoryTestRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function update(UserdirectoryUpdateRequest|array $request): UserdirectoryUpdateRequest
    {
        return $this->request(UserdirectoryUpdateRequest::class, $request);
    }
}
