<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api;

use Idiot\Zabbix\Requests\HousekeepingGetRequest;
use Idiot\Zabbix\Requests\HousekeepingUpdateRequest;
use Idiot\Zabbix\Requests\ZabbixRequest;

final class HousekeepingApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function get(HousekeepingGetRequest|array $request = []): ZabbixRequest
    {
        return $this->request(HousekeepingGetRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function update(HousekeepingUpdateRequest|array $request): ZabbixRequest
    {
        return $this->request(HousekeepingUpdateRequest::class, $request);
    }
}
