<?php

declare(strict_types=1);

namespace IntelliTrend\Zabbix\Api;

use IntelliTrend\Zabbix\Requests\TriggerprototypeCreateRequest;
use IntelliTrend\Zabbix\Requests\TriggerprototypeDeleteRequest;
use IntelliTrend\Zabbix\Requests\TriggerprototypeGetRequest;
use IntelliTrend\Zabbix\Requests\TriggerprototypeUpdateRequest;

final class TriggerPrototypeApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function create(TriggerprototypeCreateRequest|array $request): TriggerprototypeCreateRequest
    {
        return $this->request(TriggerprototypeCreateRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function delete(TriggerprototypeDeleteRequest|array $request): TriggerprototypeDeleteRequest
    {
        return $this->request(TriggerprototypeDeleteRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(TriggerprototypeGetRequest|array $request = []): TriggerprototypeGetRequest
    {
        return $this->request(TriggerprototypeGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): TriggerprototypeGetRequest
    {
        return $this->filterRequest(TriggerprototypeGetRequest::class, $filter);
    }

    /** @param array<string, mixed> $request */
    public function update(TriggerprototypeUpdateRequest|array $request): TriggerprototypeUpdateRequest
    {
        return $this->request(TriggerprototypeUpdateRequest::class, $request);
    }
}
