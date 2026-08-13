<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Groups;

use Idiot\Zabbix\Api\Requests\TaskCreateRequest;
use Idiot\Zabbix\Api\Requests\TaskGetRequest;
use Idiot\Zabbix\Request;

final class TaskApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function create(TaskCreateRequest|array $request): Request
    {
        return $this->request(TaskCreateRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(TaskGetRequest|array $request = []): Request
    {
        return $this->request(TaskGetRequest::class, $request);
    }
}
