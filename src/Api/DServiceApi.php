<?php

declare(strict_types=1);

namespace IntelliTrend\Zabbix\Api;

use IntelliTrend\Zabbix\Requests\DserviceGetRequest;

final class DServiceApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function get(DserviceGetRequest|array $request = []): DserviceGetRequest
    {
        return $this->request(DserviceGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): DserviceGetRequest
    {
        return $this->filterRequest(DserviceGetRequest::class, $filter);
    }
}
