<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api;

use Idiot\Zabbix\Requests\AuditlogGetRequest;

final class AuditLogApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function get(AuditlogGetRequest|array $request = []): AuditlogGetRequest
    {
        return $this->request(AuditlogGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): AuditlogGetRequest
    {
        return $this->filterRequest(AuditlogGetRequest::class, $filter);
    }
}
