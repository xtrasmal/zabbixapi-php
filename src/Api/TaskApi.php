<?php

declare(strict_types=1);

namespace IntelliTrend\Zabbix\Api;

use IntelliTrend\Zabbix\Requests\TaskCreateRequest;
use IntelliTrend\Zabbix\Requests\TaskGetRequest;

final class TaskApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function create(TaskCreateRequest|array $request): TaskCreateRequest
    {
        return $this->request(TaskCreateRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(TaskGetRequest|array $request = []): TaskGetRequest
    {
        return $this->request(TaskGetRequest::class, $request);
    }
}
