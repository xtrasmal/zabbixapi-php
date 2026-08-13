<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Groups;

use Idiot\Zabbix\Request;
use Idiot\Zabbix\Requests\HostinterfaceCreateRequest;
use Idiot\Zabbix\Requests\HostinterfaceDeleteRequest;
use Idiot\Zabbix\Requests\HostinterfaceGetRequest;
use Idiot\Zabbix\Requests\HostinterfaceMassaddRequest;
use Idiot\Zabbix\Requests\HostinterfaceMassremoveRequest;
use Idiot\Zabbix\Requests\HostinterfaceReplacehostinterfacesRequest;
use Idiot\Zabbix\Requests\HostinterfaceUpdateRequest;

final class HostInterfaceApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function create(HostinterfaceCreateRequest|array $request): Request
    {
        return $this->request(HostinterfaceCreateRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function delete(HostinterfaceDeleteRequest|array $request): Request
    {
        return $this->request(HostinterfaceDeleteRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(HostinterfaceGetRequest|array $request = []): Request
    {
        return $this->request(HostinterfaceGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): Request
    {
        return $this->filterRequest(HostinterfaceGetRequest::class, $filter);
    }

    /** @param array<string, mixed> $request */
    public function massAdd(HostinterfaceMassaddRequest|array $request): Request
    {
        return $this->request(HostinterfaceMassaddRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function massRemove(HostinterfaceMassremoveRequest|array $request): Request
    {
        return $this->request(HostinterfaceMassremoveRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function replaceHostInterfaces(HostinterfaceReplacehostinterfacesRequest|array $request): Request
    {
        return $this->request(HostinterfaceReplacehostinterfacesRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function update(HostinterfaceUpdateRequest|array $request): Request
    {
        return $this->request(HostinterfaceUpdateRequest::class, $request);
    }
}
