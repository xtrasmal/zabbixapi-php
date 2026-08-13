<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api;

use Idiot\Zabbix\Requests\ImageCreateRequest;
use Idiot\Zabbix\Requests\ImageDeleteRequest;
use Idiot\Zabbix\Requests\ImageGetRequest;
use Idiot\Zabbix\Requests\ImageUpdateRequest;
use Idiot\Zabbix\Requests\ZabbixRequest;

final class ImageApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function create(ImageCreateRequest|array $request): ZabbixRequest
    {
        return $this->request(ImageCreateRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function delete(ImageDeleteRequest|array $request): ZabbixRequest
    {
        return $this->request(ImageDeleteRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(ImageGetRequest|array $request = []): ZabbixRequest
    {
        return $this->request(ImageGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): ZabbixRequest
    {
        return $this->filterRequest(ImageGetRequest::class, $filter);
    }

    /** @param array<string, mixed> $request */
    public function update(ImageUpdateRequest|array $request): ZabbixRequest
    {
        return $this->request(ImageUpdateRequest::class, $request);
    }
}
