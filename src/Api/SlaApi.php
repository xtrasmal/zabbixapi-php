<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api;

use Idiot\Zabbix\Requests\SlaCreateRequest;
use Idiot\Zabbix\Requests\SlaDeleteRequest;
use Idiot\Zabbix\Requests\SlaGetRequest;
use Idiot\Zabbix\Requests\SlaGetsliRequest;
use Idiot\Zabbix\Requests\SlaUpdateRequest;
use Idiot\Zabbix\Requests\ZabbixRequest;

final class SlaApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function create(SlaCreateRequest|array $request): ZabbixRequest
    {
        return $this->request(SlaCreateRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function delete(SlaDeleteRequest|array $request): ZabbixRequest
    {
        return $this->request(SlaDeleteRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(SlaGetRequest|array $request = []): ZabbixRequest
    {
        return $this->request(SlaGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): ZabbixRequest
    {
        return $this->filterRequest(SlaGetRequest::class, $filter);
    }

    /** @param array<string, mixed> $request */
    public function getSli(SlaGetsliRequest|array $request): ZabbixRequest
    {
        return $this->request(SlaGetsliRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function update(SlaUpdateRequest|array $request): ZabbixRequest
    {
        return $this->request(SlaUpdateRequest::class, $request);
    }
}
