<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api;

use Idiot\Zabbix\Requests\HanodeGetRequest;
use Idiot\Zabbix\Requests\ZabbixRequest;

final class HaNodeApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function get(HanodeGetRequest|array $request = []): ZabbixRequest
    {
        return $this->request(HanodeGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): ZabbixRequest
    {
        return $this->filterRequest(HanodeGetRequest::class, $filter);
    }
}
