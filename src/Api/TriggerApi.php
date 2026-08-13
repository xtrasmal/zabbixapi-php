<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api;

use Idiot\Zabbix\Requests\TriggerCreateRequest;
use Idiot\Zabbix\Requests\TriggerDeleteRequest;
use Idiot\Zabbix\Requests\TriggerGetRequest;
use Idiot\Zabbix\Requests\TriggerUpdateRequest;
use Idiot\Zabbix\Requests\ZabbixRequest;

final class TriggerApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function create(TriggerCreateRequest|array $request): ZabbixRequest
    {
        return $this->request(TriggerCreateRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function delete(TriggerDeleteRequest|array $request): ZabbixRequest
    {
        return $this->request(TriggerDeleteRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(TriggerGetRequest|array $request = []): ZabbixRequest
    {
        return $this->request(TriggerGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): ZabbixRequest
    {
        return $this->filterRequest(TriggerGetRequest::class, $filter);
    }

    /** @param array<string, mixed> $request */
    public function update(TriggerUpdateRequest|array $request): ZabbixRequest
    {
        return $this->request(TriggerUpdateRequest::class, $request);
    }
}
