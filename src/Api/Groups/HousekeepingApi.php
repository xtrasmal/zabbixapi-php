<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Groups;

use Idiot\Zabbix\Api\Requests\HousekeepingGetRequest;
use Idiot\Zabbix\Api\Requests\HousekeepingUpdateRequest;
use Idiot\Zabbix\Request;

final class HousekeepingApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function get(HousekeepingGetRequest|array $request = []): Request
    {
        return $this->request(HousekeepingGetRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function update(HousekeepingUpdateRequest|array $request): Request
    {
        return $this->request(HousekeepingUpdateRequest::class, $request);
    }
}
