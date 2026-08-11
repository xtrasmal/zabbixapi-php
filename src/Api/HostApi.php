<?php

declare(strict_types=1);

namespace IntelliTrend\Zabbix\Api;

use IntelliTrend\Zabbix\Requests\HostCreateRequest;
use IntelliTrend\Zabbix\Requests\HostDeleteRequest;
use IntelliTrend\Zabbix\Requests\HostGetRequest;
use IntelliTrend\Zabbix\Requests\HostMassaddRequest;
use IntelliTrend\Zabbix\Requests\HostMassremoveRequest;
use IntelliTrend\Zabbix\Requests\HostMassupdateRequest;
use IntelliTrend\Zabbix\Requests\HostUpdateRequest;

final class HostApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function create(HostCreateRequest|array $request): HostCreateRequest
    {
        return $this->request(HostCreateRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function delete(HostDeleteRequest|array $request): HostDeleteRequest
    {
        return $this->request(HostDeleteRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(HostGetRequest|array $request = []): HostGetRequest
    {
        return $this->request(HostGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): HostGetRequest
    {
        return $this->filterRequest(HostGetRequest::class, $filter);
    }

    public function byHost(string $host): HostGetRequest
    {
        return $this->filter(['host' => [$host]]);
    }

    /** @param array<string, mixed> $request */
    public function massAdd(HostMassaddRequest|array $request): HostMassaddRequest
    {
        return $this->request(HostMassaddRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function massRemove(HostMassremoveRequest|array $request): HostMassremoveRequest
    {
        return $this->request(HostMassremoveRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function massUpdate(HostMassupdateRequest|array $request): HostMassupdateRequest
    {
        return $this->request(HostMassupdateRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function update(HostUpdateRequest|array $request): HostUpdateRequest
    {
        return $this->request(HostUpdateRequest::class, $request);
    }
}
