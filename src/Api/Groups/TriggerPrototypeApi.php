<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Groups;

use Idiot\Zabbix\Request;
use Idiot\Zabbix\Requests\TriggerprototypeCreateRequest;
use Idiot\Zabbix\Requests\TriggerprototypeDeleteRequest;
use Idiot\Zabbix\Requests\TriggerprototypeGetRequest;
use Idiot\Zabbix\Requests\TriggerprototypeUpdateRequest;

final class TriggerPrototypeApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function create(TriggerprototypeCreateRequest|array $request): Request
    {
        return $this->request(TriggerprototypeCreateRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function delete(TriggerprototypeDeleteRequest|array $request): Request
    {
        return $this->request(TriggerprototypeDeleteRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(TriggerprototypeGetRequest|array $request = []): Request
    {
        return $this->request(TriggerprototypeGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): Request
    {
        return $this->filterRequest(TriggerprototypeGetRequest::class, $filter);
    }

    /** @param array<string, mixed> $request */
    public function update(TriggerprototypeUpdateRequest|array $request): Request
    {
        return $this->request(TriggerprototypeUpdateRequest::class, $request);
    }
}
