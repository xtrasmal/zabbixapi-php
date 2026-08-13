<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api;

use Idiot\Zabbix\Requests\AuditlogGetRequest;
use Idiot\Zabbix\Requests\ZabbixRequest;

final class AuditLogApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function get(AuditlogGetRequest|array $request = []): ZabbixRequest
    {
        return $this->request(AuditlogGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): ZabbixRequest
    {
        return $this->filterRequest(AuditlogGetRequest::class, $filter);
    }
}
