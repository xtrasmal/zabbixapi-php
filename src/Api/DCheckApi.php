<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api;

use Idiot\Zabbix\Requests\DcheckGetRequest;
use Idiot\Zabbix\Requests\ZabbixRequest;

final class DCheckApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function get(DcheckGetRequest|array $request = []): ZabbixRequest
    {
        return $this->request(DcheckGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): ZabbixRequest
    {
        return $this->filterRequest(DcheckGetRequest::class, $filter);
    }
}
