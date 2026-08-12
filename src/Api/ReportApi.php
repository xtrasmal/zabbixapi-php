<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api;

use Idiot\Zabbix\Requests\ReportCreateRequest;
use Idiot\Zabbix\Requests\ReportDeleteRequest;
use Idiot\Zabbix\Requests\ReportGetRequest;
use Idiot\Zabbix\Requests\ReportUpdateRequest;

final class ReportApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function create(ReportCreateRequest|array $request): ReportCreateRequest
    {
        return $this->request(ReportCreateRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function delete(ReportDeleteRequest|array $request): ReportDeleteRequest
    {
        return $this->request(ReportDeleteRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(ReportGetRequest|array $request = []): ReportGetRequest
    {
        return $this->request(ReportGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): ReportGetRequest
    {
        return $this->filterRequest(ReportGetRequest::class, $filter);
    }

    /** @param array<string, mixed> $request */
    public function update(ReportUpdateRequest|array $request): ReportUpdateRequest
    {
        return $this->request(ReportUpdateRequest::class, $request);
    }
}
