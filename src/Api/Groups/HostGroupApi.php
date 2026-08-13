<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Groups;

use Idiot\Zabbix\Request;
use Idiot\Zabbix\Requests\HostgroupCreateRequest;
use Idiot\Zabbix\Requests\HostgroupDeleteRequest;
use Idiot\Zabbix\Requests\HostgroupGetRequest;
use Idiot\Zabbix\Requests\HostgroupMassaddRequest;
use Idiot\Zabbix\Requests\HostgroupMassremoveRequest;
use Idiot\Zabbix\Requests\HostgroupMassupdateRequest;
use Idiot\Zabbix\Requests\HostgroupPropagateRequest;
use Idiot\Zabbix\Requests\HostgroupUpdateRequest;

final class HostGroupApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function create(HostgroupCreateRequest|array $request): Request
    {
        return $this->request(HostgroupCreateRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function delete(HostgroupDeleteRequest|array $request): Request
    {
        return $this->request(HostgroupDeleteRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(HostgroupGetRequest|array $request = []): Request
    {
        return $this->request(HostgroupGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): Request
    {
        return $this->filterRequest(HostgroupGetRequest::class, $filter);
    }

    /** @param array<string, mixed> $request */
    public function massAdd(HostgroupMassaddRequest|array $request): Request
    {
        return $this->request(HostgroupMassaddRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function massRemove(HostgroupMassremoveRequest|array $request): Request
    {
        return $this->request(HostgroupMassremoveRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function massUpdate(HostgroupMassupdateRequest|array $request): Request
    {
        return $this->request(HostgroupMassupdateRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function propagate(HostgroupPropagateRequest|array $request): Request
    {
        return $this->request(HostgroupPropagateRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function update(HostgroupUpdateRequest|array $request): Request
    {
        return $this->request(HostgroupUpdateRequest::class, $request);
    }
}
