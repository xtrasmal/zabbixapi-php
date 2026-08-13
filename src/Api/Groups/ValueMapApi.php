<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Groups;

use Idiot\Zabbix\Request;
use Idiot\Zabbix\Requests\ValuemapCreateRequest;
use Idiot\Zabbix\Requests\ValuemapDeleteRequest;
use Idiot\Zabbix\Requests\ValuemapGetRequest;
use Idiot\Zabbix\Requests\ValuemapUpdateRequest;

final class ValueMapApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function create(ValuemapCreateRequest|array $request): Request
    {
        return $this->request(ValuemapCreateRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function delete(ValuemapDeleteRequest|array $request): Request
    {
        return $this->request(ValuemapDeleteRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(ValuemapGetRequest|array $request = []): Request
    {
        return $this->request(ValuemapGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): Request
    {
        return $this->filterRequest(ValuemapGetRequest::class, $filter);
    }

    /** @param array<string, mixed> $request */
    public function update(ValuemapUpdateRequest|array $request): Request
    {
        return $this->request(ValuemapUpdateRequest::class, $request);
    }
}
