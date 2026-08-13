<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Groups;

use Idiot\Zabbix\Request;
use Idiot\Zabbix\Requests\GraphitemGetRequest;

final class GraphItemApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function get(GraphitemGetRequest|array $request = []): Request
    {
        return $this->request(GraphitemGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): Request
    {
        return $this->filterRequest(GraphitemGetRequest::class, $filter);
    }
}
