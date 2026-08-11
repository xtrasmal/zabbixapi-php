<?php

declare(strict_types=1);

namespace IntelliTrend\Zabbix\Api;

use IntelliTrend\Zabbix\Requests\TriggerCreateRequest;
use IntelliTrend\Zabbix\Requests\TriggerDeleteRequest;
use IntelliTrend\Zabbix\Requests\TriggerGetRequest;
use IntelliTrend\Zabbix\Requests\TriggerUpdateRequest;

final class TriggerApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function create(TriggerCreateRequest|array $request): TriggerCreateRequest
    {
        return $this->request(TriggerCreateRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function delete(TriggerDeleteRequest|array $request): TriggerDeleteRequest
    {
        return $this->request(TriggerDeleteRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(TriggerGetRequest|array $request = []): TriggerGetRequest
    {
        return $this->request(TriggerGetRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function update(TriggerUpdateRequest|array $request): TriggerUpdateRequest
    {
        return $this->request(TriggerUpdateRequest::class, $request);
    }
}
