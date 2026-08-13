<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Groups;

use Idiot\Zabbix\Request;
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
    public function create(HostCreateRequest|array $request): Request
    {
        return $this->request(HostCreateRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function delete(HostDeleteRequest|array $request): Request
    {
        return $this->request(HostDeleteRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(HostGetRequest|array $request = []): Request
    {
        return $this->request(HostGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): Request
    {
        return $this->filterRequest(HostGetRequest::class, $filter);
    }

    /** @param array<string, mixed> $request */
    public function massAdd(HostMassaddRequest|array $request): Request
    {
        return $this->request(HostMassaddRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function massRemove(HostMassremoveRequest|array $request): Request
    {
        return $this->request(HostMassremoveRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function massUpdate(HostMassupdateRequest|array $request): Request
    {
        return $this->request(HostMassupdateRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function update(HostUpdateRequest|array $request): Request
    {
        return $this->request(HostUpdateRequest::class, $request);
    }
}
