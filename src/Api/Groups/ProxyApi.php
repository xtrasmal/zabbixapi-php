<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Groups;

use Idiot\Zabbix\Api\Requests\ProxyCreateRequest;
use Idiot\Zabbix\Api\Requests\ProxyDeleteRequest;
use Idiot\Zabbix\Api\Requests\ProxyGetRequest;
use Idiot\Zabbix\Api\Requests\ProxyUpdateRequest;
use Idiot\Zabbix\Request;

final class ProxyApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function create(ProxyCreateRequest|array $request): Request
    {
        return $this->request(ProxyCreateRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function delete(ProxyDeleteRequest|array $request): Request
    {
        return $this->request(ProxyDeleteRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(ProxyGetRequest|array $request = []): Request
    {
        return $this->request(ProxyGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): Request
    {
        return $this->filterRequest(ProxyGetRequest::class, $filter);
    }

    /** @param array<string, mixed> $request */
    public function update(ProxyUpdateRequest|array $request): Request
    {
        return $this->request(ProxyUpdateRequest::class, $request);
    }
}
