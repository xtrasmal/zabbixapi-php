<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api;

use Idiot\Zabbix\Requests\HostCreateRequest;
use Idiot\Zabbix\Requests\HostDeleteRequest;
use Idiot\Zabbix\Requests\HostGetRequest;
use Idiot\Zabbix\Requests\HostMassaddRequest;
use Idiot\Zabbix\Requests\HostMassremoveRequest;
use Idiot\Zabbix\Requests\HostMassupdateRequest;
use Idiot\Zabbix\Requests\HostUpdateRequest;
use Idiot\Zabbix\Requests\ZabbixRequest;

final class HostApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function create(HostCreateRequest|array $request): ZabbixRequest
    {
        return $this->request(HostCreateRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function delete(HostDeleteRequest|array $request): ZabbixRequest
    {
        return $this->request(HostDeleteRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(HostGetRequest|array $request = []): ZabbixRequest
    {
        return $this->request(HostGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): ZabbixRequest
    {
        return $this->filterRequest(HostGetRequest::class, $filter);
    }

    /** @param array<string, mixed> $request */
    public function massAdd(HostMassaddRequest|array $request): ZabbixRequest
    {
        return $this->request(HostMassaddRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function massRemove(HostMassremoveRequest|array $request): ZabbixRequest
    {
        return $this->request(HostMassremoveRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function massUpdate(HostMassupdateRequest|array $request): ZabbixRequest
    {
        return $this->request(HostMassupdateRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function update(HostUpdateRequest|array $request): ZabbixRequest
    {
        return $this->request(HostUpdateRequest::class, $request);
    }
}
