<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api;

use Idiot\Zabbix\Requests\GraphitemGetRequest;
use Idiot\Zabbix\Requests\ZabbixRequest;

final class GraphItemApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function get(GraphitemGetRequest|array $request = []): ZabbixRequest
    {
        return $this->request(GraphitemGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): ZabbixRequest
    {
        return $this->filterRequest(GraphitemGetRequest::class, $filter);
    }
}
