<?php

declare(strict_types=1);

namespace IntelliTrend\Zabbix\Api;

use IntelliTrend\Zabbix\Requests\DruleCreateRequest;
use IntelliTrend\Zabbix\Requests\DruleDeleteRequest;
use IntelliTrend\Zabbix\Requests\DruleGetRequest;
use IntelliTrend\Zabbix\Requests\DruleUpdateRequest;

final class DRuleApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function create(DruleCreateRequest|array $request): DruleCreateRequest
    {
        return $this->request(DruleCreateRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function delete(DruleDeleteRequest|array $request): DruleDeleteRequest
    {
        return $this->request(DruleDeleteRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(DruleGetRequest|array $request = []): DruleGetRequest
    {
        return $this->request(DruleGetRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function update(DruleUpdateRequest|array $request): DruleUpdateRequest
    {
        return $this->request(DruleUpdateRequest::class, $request);
    }
}
