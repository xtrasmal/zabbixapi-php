<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api;

use Idiot\Zabbix\Requests\IconmapCreateRequest;
use Idiot\Zabbix\Requests\IconmapDeleteRequest;
use Idiot\Zabbix\Requests\IconmapGetRequest;
use Idiot\Zabbix\Requests\IconmapUpdateRequest;
use Idiot\Zabbix\Requests\ZabbixRequest;

final class IconMapApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function create(IconmapCreateRequest|array $request): ZabbixRequest
    {
        return $this->request(IconmapCreateRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function delete(IconmapDeleteRequest|array $request): ZabbixRequest
    {
        return $this->request(IconmapDeleteRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(IconmapGetRequest|array $request = []): ZabbixRequest
    {
        return $this->request(IconmapGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): ZabbixRequest
    {
        return $this->filterRequest(IconmapGetRequest::class, $filter);
    }

    /** @param array<string, mixed> $request */
    public function update(IconmapUpdateRequest|array $request): ZabbixRequest
    {
        return $this->request(IconmapUpdateRequest::class, $request);
    }
}
