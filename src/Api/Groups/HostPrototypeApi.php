<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Groups;

use Idiot\Zabbix\Api\Requests\HostprototypeCreateRequest;
use Idiot\Zabbix\Api\Requests\HostprototypeDeleteRequest;
use Idiot\Zabbix\Api\Requests\HostprototypeGetRequest;
use Idiot\Zabbix\Api\Requests\HostprototypeUpdateRequest;
use Idiot\Zabbix\Request;

final class HostPrototypeApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function create(HostprototypeCreateRequest|array $request): Request
    {
        return $this->request(HostprototypeCreateRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function delete(HostprototypeDeleteRequest|array $request): Request
    {
        return $this->request(HostprototypeDeleteRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(HostprototypeGetRequest|array $request = []): Request
    {
        return $this->request(HostprototypeGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): Request
    {
        return $this->filterRequest(HostprototypeGetRequest::class, $filter);
    }

    /** @param array<string, mixed> $request */
    public function update(HostprototypeUpdateRequest|array $request): Request
    {
        return $this->request(HostprototypeUpdateRequest::class, $request);
    }
}
