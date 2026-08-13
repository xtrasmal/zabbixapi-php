<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Groups;

use Idiot\Zabbix\Request;
use Idiot\Zabbix\Requests\IconmapCreateRequest;
use Idiot\Zabbix\Requests\IconmapDeleteRequest;
use Idiot\Zabbix\Requests\IconmapGetRequest;
use Idiot\Zabbix\Requests\IconmapUpdateRequest;

final class IconMapApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function create(IconmapCreateRequest|array $request): Request
    {
        return $this->request(IconmapCreateRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function delete(IconmapDeleteRequest|array $request): Request
    {
        return $this->request(IconmapDeleteRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(IconmapGetRequest|array $request = []): Request
    {
        return $this->request(IconmapGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): Request
    {
        return $this->filterRequest(IconmapGetRequest::class, $filter);
    }

    /** @param array<string, mixed> $request */
    public function update(IconmapUpdateRequest|array $request): Request
    {
        return $this->request(IconmapUpdateRequest::class, $request);
    }
}
