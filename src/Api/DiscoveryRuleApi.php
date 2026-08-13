<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api;

use Idiot\Zabbix\Requests\DiscoveryruleCopyRequest;
use Idiot\Zabbix\Requests\DiscoveryruleCreateRequest;
use Idiot\Zabbix\Requests\DiscoveryruleDeleteRequest;
use Idiot\Zabbix\Requests\DiscoveryruleGetRequest;
use Idiot\Zabbix\Requests\DiscoveryruleUpdateRequest;
use Idiot\Zabbix\Requests\ZabbixRequest;

final class DiscoveryRuleApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function copy(DiscoveryruleCopyRequest|array $request): ZabbixRequest
    {
        return $this->request(DiscoveryruleCopyRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function create(DiscoveryruleCreateRequest|array $request): ZabbixRequest
    {
        return $this->request(DiscoveryruleCreateRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function delete(DiscoveryruleDeleteRequest|array $request): ZabbixRequest
    {
        return $this->request(DiscoveryruleDeleteRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(DiscoveryruleGetRequest|array $request = []): ZabbixRequest
    {
        return $this->request(DiscoveryruleGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): ZabbixRequest
    {
        return $this->filterRequest(DiscoveryruleGetRequest::class, $filter);
    }

    /** @param array<string, mixed> $request */
    public function update(DiscoveryruleUpdateRequest|array $request): ZabbixRequest
    {
        return $this->request(DiscoveryruleUpdateRequest::class, $request);
    }
}
