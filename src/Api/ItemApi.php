<?php

declare(strict_types=1);

namespace IntelliTrend\Zabbix\Api;

use IntelliTrend\Zabbix\Requests\ItemCreateRequest;
use IntelliTrend\Zabbix\Requests\ItemDeleteRequest;
use IntelliTrend\Zabbix\Requests\ItemGetRequest;
use IntelliTrend\Zabbix\Requests\ItemUpdateRequest;

final class ItemApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function create(ItemCreateRequest|array $request): ItemCreateRequest
    {
        return $this->request(ItemCreateRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function delete(ItemDeleteRequest|array $request): ItemDeleteRequest
    {
        return $this->request(ItemDeleteRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(ItemGetRequest|array $request = []): ItemGetRequest
    {
        return $this->request(ItemGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): ItemGetRequest
    {
        return $this->filterRequest(ItemGetRequest::class, $filter);
    }

    /** @param array<string, mixed> $request */
    public function update(ItemUpdateRequest|array $request): ItemUpdateRequest
    {
        return $this->request(ItemUpdateRequest::class, $request);
    }
}
