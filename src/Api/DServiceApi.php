<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api;

use Idiot\Zabbix\Requests\DserviceGetRequest;
use Idiot\Zabbix\Requests\ZabbixRequest;

final class DServiceApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function get(DserviceGetRequest|array $request = []): ZabbixRequest
    {
        return $this->request(DserviceGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): ZabbixRequest
    {
        return $this->filterRequest(DserviceGetRequest::class, $filter);
    }
}
