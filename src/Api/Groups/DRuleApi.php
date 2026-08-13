<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Groups;

use Idiot\Zabbix\Api\Requests\DruleCreateRequest;
use Idiot\Zabbix\Api\Requests\DruleDeleteRequest;
use Idiot\Zabbix\Api\Requests\DruleGetRequest;
use Idiot\Zabbix\Api\Requests\DruleUpdateRequest;
use Idiot\Zabbix\Request;

final class DRuleApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function create(DruleCreateRequest|array $request): Request
    {
        return $this->request(DruleCreateRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function delete(DruleDeleteRequest|array $request): Request
    {
        return $this->request(DruleDeleteRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(DruleGetRequest|array $request = []): Request
    {
        return $this->request(DruleGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): Request
    {
        return $this->filterRequest(DruleGetRequest::class, $filter);
    }

    /** @param array<string, mixed> $request */
    public function update(DruleUpdateRequest|array $request): Request
    {
        return $this->request(DruleUpdateRequest::class, $request);
    }
}
