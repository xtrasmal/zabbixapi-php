<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Groups;

use Idiot\Zabbix\Request;
use Idiot\Zabbix\Requests\TemplatedashboardCreateRequest;
use Idiot\Zabbix\Requests\TemplatedashboardDeleteRequest;
use Idiot\Zabbix\Requests\TemplatedashboardGetRequest;
use Idiot\Zabbix\Requests\TemplatedashboardUpdateRequest;

final class TemplateDashboardApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function create(TemplatedashboardCreateRequest|array $request): Request
    {
        return $this->request(TemplatedashboardCreateRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function delete(TemplatedashboardDeleteRequest|array $request): Request
    {
        return $this->request(TemplatedashboardDeleteRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(TemplatedashboardGetRequest|array $request = []): Request
    {
        return $this->request(TemplatedashboardGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): Request
    {
        return $this->filterRequest(TemplatedashboardGetRequest::class, $filter);
    }

    /** @param array<string, mixed> $request */
    public function update(TemplatedashboardUpdateRequest|array $request): Request
    {
        return $this->request(TemplatedashboardUpdateRequest::class, $request);
    }
}
