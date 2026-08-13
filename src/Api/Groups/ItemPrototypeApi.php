<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Groups;

use Idiot\Zabbix\Request;
use Idiot\Zabbix\Requests\ItemprototypeCreateRequest;
use Idiot\Zabbix\Requests\ItemprototypeDeleteRequest;
use Idiot\Zabbix\Requests\ItemprototypeGetRequest;
use Idiot\Zabbix\Requests\ItemprototypeUpdateRequest;

final class ItemPrototypeApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function create(ItemprototypeCreateRequest|array $request): Request
    {
        return $this->request(ItemprototypeCreateRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function delete(ItemprototypeDeleteRequest|array $request): Request
    {
        return $this->request(ItemprototypeDeleteRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(ItemprototypeGetRequest|array $request = []): Request
    {
        return $this->request(ItemprototypeGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): Request
    {
        return $this->filterRequest(ItemprototypeGetRequest::class, $filter);
    }

    /** @param array<string, mixed> $request */
    public function update(ItemprototypeUpdateRequest|array $request): Request
    {
        return $this->request(ItemprototypeUpdateRequest::class, $request);
    }
}
