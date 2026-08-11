<?php

declare(strict_types=1);

namespace IntelliTrend\Zabbix\Api;

use IntelliTrend\Zabbix\Requests\TrendGetRequest;

final class TrendApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function get(TrendGetRequest|array $request = []): TrendGetRequest
    {
        return $this->request(TrendGetRequest::class, $request);
    }
}
