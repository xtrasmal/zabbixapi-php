<?php

declare(strict_types=1);

namespace IntelliTrend\Zabbix\Api;

use IntelliTrend\Zabbix\Requests\HousekeepingGetRequest;
use IntelliTrend\Zabbix\Requests\HousekeepingUpdateRequest;

final class HousekeepingApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function get(HousekeepingGetRequest|array $request = []): HousekeepingGetRequest
    {
        return $this->request(HousekeepingGetRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function update(HousekeepingUpdateRequest|array $request): HousekeepingUpdateRequest
    {
        return $this->request(HousekeepingUpdateRequest::class, $request);
    }
}
