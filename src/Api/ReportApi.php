<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api;

use Idiot\Zabbix\Requests\ReportCreateRequest;
use Idiot\Zabbix\Requests\ReportDeleteRequest;
use Idiot\Zabbix\Requests\ReportGetRequest;
use Idiot\Zabbix\Requests\ReportUpdateRequest;
use Idiot\Zabbix\Requests\ZabbixRequest;

final class ReportApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function create(ReportCreateRequest|array $request): ZabbixRequest
    {
        return $this->request(ReportCreateRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function delete(ReportDeleteRequest|array $request): ZabbixRequest
    {
        return $this->request(ReportDeleteRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(ReportGetRequest|array $request = []): ZabbixRequest
    {
        return $this->request(ReportGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): ZabbixRequest
    {
        return $this->filterRequest(ReportGetRequest::class, $filter);
    }

    /** @param array<string, mixed> $request */
    public function update(ReportUpdateRequest|array $request): ZabbixRequest
    {
        return $this->request(ReportUpdateRequest::class, $request);
    }
}
