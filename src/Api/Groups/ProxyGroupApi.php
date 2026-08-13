<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Groups;

use Idiot\Zabbix\Request;
use Idiot\Zabbix\Requests\ProxygroupCreateRequest;
use Idiot\Zabbix\Requests\ProxygroupDeleteRequest;
use Idiot\Zabbix\Requests\ProxygroupGetRequest;
use Idiot\Zabbix\Requests\ProxygroupUpdateRequest;

final class ProxyGroupApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function create(ProxygroupCreateRequest|array $request): Request
    {
        return $this->request(ProxygroupCreateRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function delete(ProxygroupDeleteRequest|array $request): Request
    {
        return $this->request(ProxygroupDeleteRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(ProxygroupGetRequest|array $request = []): Request
    {
        return $this->request(ProxygroupGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): Request
    {
        return $this->filterRequest(ProxygroupGetRequest::class, $filter);
    }

    /** @param array<string, mixed> $request */
    public function update(ProxygroupUpdateRequest|array $request): Request
    {
        return $this->request(ProxygroupUpdateRequest::class, $request);
    }
}
