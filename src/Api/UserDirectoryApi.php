<?php

declare(strict_types=1);

namespace IntelliTrend\Zabbix\Api;

use IntelliTrend\Zabbix\Requests\UserdirectoryCreateRequest;
use IntelliTrend\Zabbix\Requests\UserdirectoryDeleteRequest;
use IntelliTrend\Zabbix\Requests\UserdirectoryGetRequest;
use IntelliTrend\Zabbix\Requests\UserdirectoryTestRequest;
use IntelliTrend\Zabbix\Requests\UserdirectoryUpdateRequest;

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
