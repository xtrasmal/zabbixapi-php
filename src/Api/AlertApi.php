<?php

declare(strict_types=1);

namespace IntelliTrend\Zabbix\Api;

use IntelliTrend\Zabbix\Requests\AlertGetRequest;

final class AlertApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function get(AlertGetRequest|array $request = []): AlertGetRequest
    {
        return $this->request(AlertGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): AlertGetRequest
    {
        return $this->filterRequest(AlertGetRequest::class, $filter);
    }
}
