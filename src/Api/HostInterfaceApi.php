<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api;

use Idiot\Zabbix\Requests\HostinterfaceCreateRequest;
use Idiot\Zabbix\Requests\HostinterfaceDeleteRequest;
use Idiot\Zabbix\Requests\HostinterfaceGetRequest;
use Idiot\Zabbix\Requests\HostinterfaceMassaddRequest;
use Idiot\Zabbix\Requests\HostinterfaceMassremoveRequest;
use Idiot\Zabbix\Requests\HostinterfaceReplacehostinterfacesRequest;
use Idiot\Zabbix\Requests\HostinterfaceUpdateRequest;
use Idiot\Zabbix\Requests\ZabbixRequest;

final class HostInterfaceApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function create(HostinterfaceCreateRequest|array $request): ZabbixRequest
    {
        return $this->request(HostinterfaceCreateRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function delete(HostinterfaceDeleteRequest|array $request): ZabbixRequest
    {
        return $this->request(HostinterfaceDeleteRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(HostinterfaceGetRequest|array $request = []): ZabbixRequest
    {
        return $this->request(HostinterfaceGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): ZabbixRequest
    {
        return $this->filterRequest(HostinterfaceGetRequest::class, $filter);
    }

    /** @param array<string, mixed> $request */
    public function massAdd(HostinterfaceMassaddRequest|array $request): ZabbixRequest
    {
        return $this->request(HostinterfaceMassaddRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function massRemove(HostinterfaceMassremoveRequest|array $request): ZabbixRequest
    {
        return $this->request(HostinterfaceMassremoveRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function replaceHostInterfaces(HostinterfaceReplacehostinterfacesRequest|array $request): ZabbixRequest
    {
        return $this->request(HostinterfaceReplacehostinterfacesRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function update(HostinterfaceUpdateRequest|array $request): ZabbixRequest
    {
        return $this->request(HostinterfaceUpdateRequest::class, $request);
    }
}
