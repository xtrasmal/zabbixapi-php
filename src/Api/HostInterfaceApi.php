<?php

declare(strict_types=1);

namespace IntelliTrend\Zabbix\Api;

use IntelliTrend\Zabbix\Requests\HostinterfaceCreateRequest;
use IntelliTrend\Zabbix\Requests\HostinterfaceDeleteRequest;
use IntelliTrend\Zabbix\Requests\HostinterfaceGetRequest;
use IntelliTrend\Zabbix\Requests\HostinterfaceMassaddRequest;
use IntelliTrend\Zabbix\Requests\HostinterfaceMassremoveRequest;
use IntelliTrend\Zabbix\Requests\HostinterfaceReplacehostinterfacesRequest;
use IntelliTrend\Zabbix\Requests\HostinterfaceUpdateRequest;

final class HostInterfaceApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function create(HostinterfaceCreateRequest|array $request): HostinterfaceCreateRequest
    {
        return $this->request(HostinterfaceCreateRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function delete(HostinterfaceDeleteRequest|array $request): HostinterfaceDeleteRequest
    {
        return $this->request(HostinterfaceDeleteRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(HostinterfaceGetRequest|array $request = []): HostinterfaceGetRequest
    {
        return $this->request(HostinterfaceGetRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function massAdd(HostinterfaceMassaddRequest|array $request): HostinterfaceMassaddRequest
    {
        return $this->request(HostinterfaceMassaddRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function massRemove(HostinterfaceMassremoveRequest|array $request): HostinterfaceMassremoveRequest
    {
        return $this->request(HostinterfaceMassremoveRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function replaceHostInterfaces(HostinterfaceReplacehostinterfacesRequest|array $request): HostinterfaceReplacehostinterfacesRequest
    {
        return $this->request(HostinterfaceReplacehostinterfacesRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function update(HostinterfaceUpdateRequest|array $request): HostinterfaceUpdateRequest
    {
        return $this->request(HostinterfaceUpdateRequest::class, $request);
    }
}
