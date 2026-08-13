<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api;

use Idiot\Zabbix\Requests\DhostGetRequest;
use Idiot\Zabbix\Requests\ZabbixRequest;

final class DHostApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function get(DhostGetRequest|array $request = []): ZabbixRequest
    {
        return $this->request(DhostGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): ZabbixRequest
    {
        return $this->filterRequest(DhostGetRequest::class, $filter);
    }
}
