<?php

declare(strict_types=1);

namespace IntelliTrend\Zabbix\Api;

use IntelliTrend\Zabbix\Requests\ReportCreateRequest;
use IntelliTrend\Zabbix\Requests\ReportDeleteRequest;
use IntelliTrend\Zabbix\Requests\ReportGetRequest;
use IntelliTrend\Zabbix\Requests\ReportUpdateRequest;

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
