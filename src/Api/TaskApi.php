<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api;

use Idiot\Zabbix\Requests\TaskCreateRequest;
use Idiot\Zabbix\Requests\TaskGetRequest;
use Idiot\Zabbix\Requests\ZabbixRequest;

final class TaskApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function create(TaskCreateRequest|array $request): ZabbixRequest
    {
        return $this->request(TaskCreateRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(TaskGetRequest|array $request = []): ZabbixRequest
    {
        return $this->request(TaskGetRequest::class, $request);
    }
}
