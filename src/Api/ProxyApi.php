<?php

declare(strict_types=1);

namespace IntelliTrend\Zabbix\Api;

use IntelliTrend\Zabbix\Requests\ProxyCreateRequest;
use IntelliTrend\Zabbix\Requests\ProxyDeleteRequest;
use IntelliTrend\Zabbix\Requests\ProxyGetRequest;
use IntelliTrend\Zabbix\Requests\ProxyUpdateRequest;

final class ProxyApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function create(ProxyCreateRequest|array $request): ProxyCreateRequest
    {
        return $this->request(ProxyCreateRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function delete(ProxyDeleteRequest|array $request): ProxyDeleteRequest
    {
        return $this->request(ProxyDeleteRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(ProxyGetRequest|array $request = []): ProxyGetRequest
    {
        return $this->request(ProxyGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): ProxyGetRequest
    {
        return $this->filterRequest(ProxyGetRequest::class, $filter);
    }

    /** @param array<string, mixed> $request */
    public function update(ProxyUpdateRequest|array $request): ProxyUpdateRequest
    {
        return $this->request(ProxyUpdateRequest::class, $request);
    }
}
