<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Groups;

use Idiot\Zabbix\Api\Requests\ItemCreateRequest;
use Idiot\Zabbix\Api\Requests\ItemDeleteRequest;
use Idiot\Zabbix\Api\Requests\ItemGetRequest;
use Idiot\Zabbix\Api\Requests\ItemUpdateRequest;
use Idiot\Zabbix\Request;

final class ItemApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function create(ItemCreateRequest|array $request): Request
    {
        return $this->request(ItemCreateRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function delete(ItemDeleteRequest|array $request): Request
    {
        return $this->request(ItemDeleteRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(ItemGetRequest|array $request = []): Request
    {
        return $this->request(ItemGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): Request
    {
        return $this->filterRequest(ItemGetRequest::class, $filter);
    }

    /** @param array<string, mixed> $request */
    public function update(ItemUpdateRequest|array $request): Request
    {
        return $this->request(ItemUpdateRequest::class, $request);
    }
}
