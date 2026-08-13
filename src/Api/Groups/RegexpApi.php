<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Groups;

use Idiot\Zabbix\Api\Requests\RegexpCreateRequest;
use Idiot\Zabbix\Api\Requests\RegexpDeleteRequest;
use Idiot\Zabbix\Api\Requests\RegexpGetRequest;
use Idiot\Zabbix\Api\Requests\RegexpUpdateRequest;
use Idiot\Zabbix\Request;

final class RegexpApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function create(RegexpCreateRequest|array $request): Request
    {
        return $this->request(RegexpCreateRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function delete(RegexpDeleteRequest|array $request): Request
    {
        return $this->request(RegexpDeleteRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(RegexpGetRequest|array $request = []): Request
    {
        return $this->request(RegexpGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): Request
    {
        return $this->filterRequest(RegexpGetRequest::class, $filter);
    }

    /** @param array<string, mixed> $request */
    public function update(RegexpUpdateRequest|array $request): Request
    {
        return $this->request(RegexpUpdateRequest::class, $request);
    }
}
