<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api;

use Idiot\Zabbix\Requests\ItemprototypeCreateRequest;
use Idiot\Zabbix\Requests\ItemprototypeDeleteRequest;
use Idiot\Zabbix\Requests\ItemprototypeGetRequest;
use Idiot\Zabbix\Requests\ItemprototypeUpdateRequest;
use Idiot\Zabbix\Requests\ZabbixRequest;

final class ItemPrototypeApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function create(ItemprototypeCreateRequest|array $request): ZabbixRequest
    {
        return $this->request(ItemprototypeCreateRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function delete(ItemprototypeDeleteRequest|array $request): ZabbixRequest
    {
        return $this->request(ItemprototypeDeleteRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(ItemprototypeGetRequest|array $request = []): ZabbixRequest
    {
        return $this->request(ItemprototypeGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): ZabbixRequest
    {
        return $this->filterRequest(ItemprototypeGetRequest::class, $filter);
    }

    /** @param array<string, mixed> $request */
    public function update(ItemprototypeUpdateRequest|array $request): ZabbixRequest
    {
        return $this->request(ItemprototypeUpdateRequest::class, $request);
    }
}
