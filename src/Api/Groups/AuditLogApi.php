<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Groups;

use Idiot\Zabbix\Request;
use Idiot\Zabbix\Requests\AuditlogGetRequest;

final class AuditLogApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function get(AuditlogGetRequest|array $request = []): Request
    {
        return $this->request(AuditlogGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): Request
    {
        return $this->filterRequest(AuditlogGetRequest::class, $filter);
    }
}
