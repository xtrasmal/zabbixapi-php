<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api;

use Idiot\Zabbix\Requests\HostprototypeCreateRequest;
use Idiot\Zabbix\Requests\HostprototypeDeleteRequest;
use Idiot\Zabbix\Requests\HostprototypeGetRequest;
use Idiot\Zabbix\Requests\HostprototypeUpdateRequest;

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

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): HostprototypeGetRequest
    {
        return $this->filterRequest(HostprototypeGetRequest::class, $filter);
    }

    /** @param array<string, mixed> $request */
    public function update(HostprototypeUpdateRequest|array $request): HostprototypeUpdateRequest
    {
        return $this->request(HostprototypeUpdateRequest::class, $request);
    }
}
