<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api;

use Idiot\Zabbix\Requests\ItemCreateRequest;
use Idiot\Zabbix\Requests\ItemDeleteRequest;
use Idiot\Zabbix\Requests\ItemGetRequest;
use Idiot\Zabbix\Requests\ItemUpdateRequest;
use Idiot\Zabbix\Requests\ZabbixRequest;

final class ItemApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function create(ItemCreateRequest|array $request): ZabbixRequest
    {
        return $this->request(ItemCreateRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function delete(ItemDeleteRequest|array $request): ZabbixRequest
    {
        return $this->request(ItemDeleteRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(ItemGetRequest|array $request = []): ZabbixRequest
    {
        return $this->request(ItemGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): ZabbixRequest
    {
        return $this->filterRequest(ItemGetRequest::class, $filter);
    }

    /** @param array<string, mixed> $request */
    public function update(ItemUpdateRequest|array $request): ZabbixRequest
    {
        return $this->request(ItemUpdateRequest::class, $request);
    }
}
