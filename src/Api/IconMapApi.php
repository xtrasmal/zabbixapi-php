<?php

declare(strict_types=1);

namespace IntelliTrend\Zabbix\Api;

use IntelliTrend\Zabbix\Requests\IconmapCreateRequest;
use IntelliTrend\Zabbix\Requests\IconmapDeleteRequest;
use IntelliTrend\Zabbix\Requests\IconmapGetRequest;
use IntelliTrend\Zabbix\Requests\IconmapUpdateRequest;

final class IconMapApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function create(IconmapCreateRequest|array $request): IconmapCreateRequest
    {
        return $this->request(IconmapCreateRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function delete(IconmapDeleteRequest|array $request): IconmapDeleteRequest
    {
        return $this->request(IconmapDeleteRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(IconmapGetRequest|array $request = []): IconmapGetRequest
    {
        return $this->request(IconmapGetRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function update(IconmapUpdateRequest|array $request): IconmapUpdateRequest
    {
        return $this->request(IconmapUpdateRequest::class, $request);
    }
}
