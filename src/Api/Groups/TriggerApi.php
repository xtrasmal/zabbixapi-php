<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Groups;

use Idiot\Zabbix\Api\Requests\TriggerCreateRequest;
use Idiot\Zabbix\Api\Requests\TriggerDeleteRequest;
use Idiot\Zabbix\Api\Requests\TriggerGetRequest;
use Idiot\Zabbix\Api\Requests\TriggerUpdateRequest;
use Idiot\Zabbix\Request;

final class TriggerApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function create(TriggerCreateRequest|array $request): Request
    {
        return $this->request(TriggerCreateRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function delete(TriggerDeleteRequest|array $request): Request
    {
        return $this->request(TriggerDeleteRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(TriggerGetRequest|array $request = []): Request
    {
        return $this->request(TriggerGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): Request
    {
        return $this->filterRequest(TriggerGetRequest::class, $filter);
    }

    /** @param array<string, mixed> $request */
    public function update(TriggerUpdateRequest|array $request): Request
    {
        return $this->request(TriggerUpdateRequest::class, $request);
    }
}
