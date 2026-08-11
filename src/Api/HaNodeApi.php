<?php

declare(strict_types=1);

namespace IntelliTrend\Zabbix\Api;

use IntelliTrend\Zabbix\Requests\HanodeGetRequest;

final class HaNodeApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function get(HanodeGetRequest|array $request = []): HanodeGetRequest
    {
        return $this->request(HanodeGetRequest::class, $request);
    }
}
