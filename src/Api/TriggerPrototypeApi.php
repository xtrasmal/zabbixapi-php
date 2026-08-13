<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api;

use Idiot\Zabbix\Requests\TriggerprototypeCreateRequest;
use Idiot\Zabbix\Requests\TriggerprototypeDeleteRequest;
use Idiot\Zabbix\Requests\TriggerprototypeGetRequest;
use Idiot\Zabbix\Requests\TriggerprototypeUpdateRequest;
use Idiot\Zabbix\Requests\ZabbixRequest;

final class TriggerPrototypeApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function create(TriggerprototypeCreateRequest|array $request): ZabbixRequest
    {
        return $this->request(TriggerprototypeCreateRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function delete(TriggerprototypeDeleteRequest|array $request): ZabbixRequest
    {
        return $this->request(TriggerprototypeDeleteRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(TriggerprototypeGetRequest|array $request = []): ZabbixRequest
    {
        return $this->request(TriggerprototypeGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): ZabbixRequest
    {
        return $this->filterRequest(TriggerprototypeGetRequest::class, $filter);
    }

    /** @param array<string, mixed> $request */
    public function update(TriggerprototypeUpdateRequest|array $request): ZabbixRequest
    {
        return $this->request(TriggerprototypeUpdateRequest::class, $request);
    }
}
