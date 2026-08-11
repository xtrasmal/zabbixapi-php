<?php

declare(strict_types=1);

namespace IntelliTrend\Zabbix\Api;

use IntelliTrend\Zabbix\Requests\DcheckGetRequest;

final class DCheckApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function get(DcheckGetRequest|array $request = []): DcheckGetRequest
    {
        return $this->request(DcheckGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): DcheckGetRequest
    {
        return $this->filterRequest(DcheckGetRequest::class, $filter);
    }
}
