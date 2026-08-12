<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api;

use Idiot\Zabbix\Requests\ServiceCreateRequest;
use Idiot\Zabbix\Requests\ServiceDeleteRequest;
use Idiot\Zabbix\Requests\ServiceGetRequest;
use Idiot\Zabbix\Requests\ServiceUpdateRequest;

final class ServiceApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function create(ServiceCreateRequest|array $request): ServiceCreateRequest
    {
        return $this->request(ServiceCreateRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function delete(ServiceDeleteRequest|array $request): ServiceDeleteRequest
    {
        return $this->request(ServiceDeleteRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(ServiceGetRequest|array $request = []): ServiceGetRequest
    {
        return $this->request(ServiceGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): ServiceGetRequest
    {
        return $this->filterRequest(ServiceGetRequest::class, $filter);
    }

    /** @param array<string, mixed> $request */
    public function update(ServiceUpdateRequest|array $request): ServiceUpdateRequest
    {
        return $this->request(ServiceUpdateRequest::class, $request);
    }
}
