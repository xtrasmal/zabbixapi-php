<?php

declare(strict_types=1);

namespace IntelliTrend\Zabbix\Api;

use IntelliTrend\Zabbix\Requests\GraphitemGetRequest;

final class GraphItemApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function get(GraphitemGetRequest|array $request = []): GraphitemGetRequest
    {
        return $this->request(GraphitemGetRequest::class, $request);
    }
}
