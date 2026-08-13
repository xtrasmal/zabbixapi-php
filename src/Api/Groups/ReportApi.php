<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Groups;

use Idiot\Zabbix\Api\Requests\ReportCreateRequest;
use Idiot\Zabbix\Api\Requests\ReportDeleteRequest;
use Idiot\Zabbix\Api\Requests\ReportGetRequest;
use Idiot\Zabbix\Api\Requests\ReportUpdateRequest;
use Idiot\Zabbix\Request;

final class ReportApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function create(ReportCreateRequest|array $request): Request
    {
        return $this->request(ReportCreateRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function delete(ReportDeleteRequest|array $request): Request
    {
        return $this->request(ReportDeleteRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(ReportGetRequest|array $request = []): Request
    {
        return $this->request(ReportGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): Request
    {
        return $this->filterRequest(ReportGetRequest::class, $filter);
    }

    /** @param array<string, mixed> $request */
    public function update(ReportUpdateRequest|array $request): Request
    {
        return $this->request(ReportUpdateRequest::class, $request);
    }
}
