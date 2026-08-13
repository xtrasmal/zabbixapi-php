<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Groups;

use Idiot\Zabbix\Api\Requests\DiscoveryruleCopyRequest;
use Idiot\Zabbix\Api\Requests\DiscoveryruleCreateRequest;
use Idiot\Zabbix\Api\Requests\DiscoveryruleDeleteRequest;
use Idiot\Zabbix\Api\Requests\DiscoveryruleGetRequest;
use Idiot\Zabbix\Api\Requests\DiscoveryruleUpdateRequest;
use Idiot\Zabbix\Request;

final class DiscoveryRuleApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function copy(DiscoveryruleCopyRequest|array $request): Request
    {
        return $this->request(DiscoveryruleCopyRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function create(DiscoveryruleCreateRequest|array $request): Request
    {
        return $this->request(DiscoveryruleCreateRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function delete(DiscoveryruleDeleteRequest|array $request): Request
    {
        return $this->request(DiscoveryruleDeleteRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(DiscoveryruleGetRequest|array $request = []): Request
    {
        return $this->request(DiscoveryruleGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): Request
    {
        return $this->filterRequest(DiscoveryruleGetRequest::class, $filter);
    }

    /** @param array<string, mixed> $request */
    public function update(DiscoveryruleUpdateRequest|array $request): Request
    {
        return $this->request(DiscoveryruleUpdateRequest::class, $request);
    }
}
