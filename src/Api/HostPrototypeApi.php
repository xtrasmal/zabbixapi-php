<?php

declare(strict_types=1);

namespace IntelliTrend\Zabbix\Api;

use IntelliTrend\Zabbix\Requests\HostprototypeCreateRequest;
use IntelliTrend\Zabbix\Requests\HostprototypeDeleteRequest;
use IntelliTrend\Zabbix\Requests\HostprototypeGetRequest;
use IntelliTrend\Zabbix\Requests\HostprototypeUpdateRequest;

final class HostPrototypeApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function create(HostprototypeCreateRequest|array $request): HostprototypeCreateRequest
    {
        return $this->request(HostprototypeCreateRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function delete(HostprototypeDeleteRequest|array $request): HostprototypeDeleteRequest
    {
        return $this->request(HostprototypeDeleteRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(HostprototypeGetRequest|array $request = []): HostprototypeGetRequest
    {
        return $this->request(HostprototypeGetRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function update(HostprototypeUpdateRequest|array $request): HostprototypeUpdateRequest
    {
        return $this->request(HostprototypeUpdateRequest::class, $request);
    }
}
