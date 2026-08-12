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
