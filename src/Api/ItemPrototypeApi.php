<?php

declare(strict_types=1);

namespace IntelliTrend\Zabbix\Api;

use IntelliTrend\Zabbix\Requests\ItemprototypeCreateRequest;
use IntelliTrend\Zabbix\Requests\ItemprototypeDeleteRequest;
use IntelliTrend\Zabbix\Requests\ItemprototypeGetRequest;
use IntelliTrend\Zabbix\Requests\ItemprototypeUpdateRequest;

final class ItemPrototypeApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function create(ItemprototypeCreateRequest|array $request): ItemprototypeCreateRequest
    {
        return $this->request(ItemprototypeCreateRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function delete(ItemprototypeDeleteRequest|array $request): ItemprototypeDeleteRequest
    {
        return $this->request(ItemprototypeDeleteRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(ItemprototypeGetRequest|array $request = []): ItemprototypeGetRequest
    {
        return $this->request(ItemprototypeGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): ItemprototypeGetRequest
    {
        return $this->filterRequest(ItemprototypeGetRequest::class, $filter);
    }

    /** @param array<string, mixed> $request */
    public function update(ItemprototypeUpdateRequest|array $request): ItemprototypeUpdateRequest
    {
        return $this->request(ItemprototypeUpdateRequest::class, $request);
    }
}
