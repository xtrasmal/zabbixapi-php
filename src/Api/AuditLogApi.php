<?php

declare(strict_types=1);

namespace IntelliTrend\Zabbix\Api;

use IntelliTrend\Zabbix\Requests\AuditlogGetRequest;

final class AuditLogApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function get(AuditlogGetRequest|array $request = []): AuditlogGetRequest
    {
        return $this->request(AuditlogGetRequest::class, $request);
    }
}
