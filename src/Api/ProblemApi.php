<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api;

use Idiot\Zabbix\Requests\ProblemGetRequest;
use Idiot\Zabbix\Requests\ZabbixRequest;

final class ProblemApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function get(ProblemGetRequest|array $request = []): ZabbixRequest
    {
        return $this->request(ProblemGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): ZabbixRequest
    {
        return $this->filterRequest(ProblemGetRequest::class, $filter);
    }
}
