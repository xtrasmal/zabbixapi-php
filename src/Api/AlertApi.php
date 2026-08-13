<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api;

use Idiot\Zabbix\Requests\AlertGetRequest;
use Idiot\Zabbix\Requests\ZabbixRequest;

final class AlertApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function get(AlertGetRequest|array $request = []): ZabbixRequest
    {
        return $this->request(AlertGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): ZabbixRequest
    {
        return $this->filterRequest(AlertGetRequest::class, $filter);
    }
}
