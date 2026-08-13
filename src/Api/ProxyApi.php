<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api;

use Idiot\Zabbix\Requests\ProxyCreateRequest;
use Idiot\Zabbix\Requests\ProxyDeleteRequest;
use Idiot\Zabbix\Requests\ProxyGetRequest;
use Idiot\Zabbix\Requests\ProxyUpdateRequest;
use Idiot\Zabbix\Requests\ZabbixRequest;

final class ProxyApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function create(ProxyCreateRequest|array $request): ZabbixRequest
    {
        return $this->request(ProxyCreateRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function delete(ProxyDeleteRequest|array $request): ZabbixRequest
    {
        return $this->request(ProxyDeleteRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(ProxyGetRequest|array $request = []): ZabbixRequest
    {
        return $this->request(ProxyGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): ZabbixRequest
    {
        return $this->filterRequest(ProxyGetRequest::class, $filter);
    }

    /** @param array<string, mixed> $request */
    public function update(ProxyUpdateRequest|array $request): ZabbixRequest
    {
        return $this->request(ProxyUpdateRequest::class, $request);
    }
}
