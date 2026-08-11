<?php

declare(strict_types=1);

namespace IntelliTrend\Zabbix\Api;

use IntelliTrend\Zabbix\Requests\HostgroupCreateRequest;
use IntelliTrend\Zabbix\Requests\HostgroupDeleteRequest;
use IntelliTrend\Zabbix\Requests\HostgroupGetRequest;
use IntelliTrend\Zabbix\Requests\HostgroupMassaddRequest;
use IntelliTrend\Zabbix\Requests\HostgroupMassremoveRequest;
use IntelliTrend\Zabbix\Requests\HostgroupMassupdateRequest;
use IntelliTrend\Zabbix\Requests\HostgroupPropagateRequest;
use IntelliTrend\Zabbix\Requests\HostgroupUpdateRequest;

final class HostGroupApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function create(HostgroupCreateRequest|array $request): HostgroupCreateRequest
    {
        return $this->request(HostgroupCreateRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function delete(HostgroupDeleteRequest|array $request): HostgroupDeleteRequest
    {
        return $this->request(HostgroupDeleteRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(HostgroupGetRequest|array $request = []): HostgroupGetRequest
    {
        return $this->request(HostgroupGetRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function massAdd(HostgroupMassaddRequest|array $request): HostgroupMassaddRequest
    {
        return $this->request(HostgroupMassaddRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function massRemove(HostgroupMassremoveRequest|array $request): HostgroupMassremoveRequest
    {
        return $this->request(HostgroupMassremoveRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function massUpdate(HostgroupMassupdateRequest|array $request): HostgroupMassupdateRequest
    {
        return $this->request(HostgroupMassupdateRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function propagate(HostgroupPropagateRequest|array $request): HostgroupPropagateRequest
    {
        return $this->request(HostgroupPropagateRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function update(HostgroupUpdateRequest|array $request): HostgroupUpdateRequest
    {
        return $this->request(HostgroupUpdateRequest::class, $request);
    }
}
