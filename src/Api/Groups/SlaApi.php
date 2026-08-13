<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Groups;

use Idiot\Zabbix\Api\Requests\SlaCreateRequest;
use Idiot\Zabbix\Api\Requests\SlaDeleteRequest;
use Idiot\Zabbix\Api\Requests\SlaGetRequest;
use Idiot\Zabbix\Api\Requests\SlaGetsliRequest;
use Idiot\Zabbix\Api\Requests\SlaUpdateRequest;
use Idiot\Zabbix\Request;

final class SlaApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function create(SlaCreateRequest|array $request): Request
    {
        return $this->request(SlaCreateRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function delete(SlaDeleteRequest|array $request): Request
    {
        return $this->request(SlaDeleteRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(SlaGetRequest|array $request = []): Request
    {
        return $this->request(SlaGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): Request
    {
        return $this->filterRequest(SlaGetRequest::class, $filter);
    }

    /** @param array<string, mixed> $request */
    public function getSli(SlaGetsliRequest|array $request): Request
    {
        return $this->request(SlaGetsliRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function update(SlaUpdateRequest|array $request): Request
    {
        return $this->request(SlaUpdateRequest::class, $request);
    }
}
