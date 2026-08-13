<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Groups;

use Idiot\Zabbix\Api\Requests\ServiceCreateRequest;
use Idiot\Zabbix\Api\Requests\ServiceDeleteRequest;
use Idiot\Zabbix\Api\Requests\ServiceGetRequest;
use Idiot\Zabbix\Api\Requests\ServiceUpdateRequest;
use Idiot\Zabbix\Request;

final class ServiceApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function create(ServiceCreateRequest|array $request): Request
    {
        return $this->request(ServiceCreateRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function delete(ServiceDeleteRequest|array $request): Request
    {
        return $this->request(ServiceDeleteRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(ServiceGetRequest|array $request = []): Request
    {
        return $this->request(ServiceGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): Request
    {
        return $this->filterRequest(ServiceGetRequest::class, $filter);
    }

    /** @param array<string, mixed> $request */
    public function update(ServiceUpdateRequest|array $request): Request
    {
        return $this->request(ServiceUpdateRequest::class, $request);
    }
}
