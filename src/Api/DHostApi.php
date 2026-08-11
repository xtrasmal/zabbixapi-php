<?php

declare(strict_types=1);

namespace IntelliTrend\Zabbix\Api;

use IntelliTrend\Zabbix\Requests\DhostGetRequest;

final class DHostApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function get(DhostGetRequest|array $request = []): DhostGetRequest
    {
        return $this->request(DhostGetRequest::class, $request);
    }
}
