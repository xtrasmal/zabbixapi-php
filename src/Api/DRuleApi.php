<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api;

use Idiot\Zabbix\Requests\DruleCreateRequest;
use Idiot\Zabbix\Requests\DruleDeleteRequest;
use Idiot\Zabbix\Requests\DruleGetRequest;
use Idiot\Zabbix\Requests\DruleUpdateRequest;

final class DRuleApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function create(DruleCreateRequest|array $request): DruleCreateRequest
    {
        return $this->request(DruleCreateRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function delete(DruleDeleteRequest|array $request): DruleDeleteRequest
    {
        return $this->request(DruleDeleteRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(DruleGetRequest|array $request = []): DruleGetRequest
    {
        return $this->request(DruleGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): DruleGetRequest
    {
        return $this->filterRequest(DruleGetRequest::class, $filter);
    }

    /** @param array<string, mixed> $request */
    public function update(DruleUpdateRequest|array $request): DruleUpdateRequest
    {
        return $this->request(DruleUpdateRequest::class, $request);
    }
}
