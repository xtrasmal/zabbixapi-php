<?php

declare(strict_types=1);

namespace IntelliTrend\Zabbix\Api;

use IntelliTrend\Zabbix\Requests\ImageCreateRequest;
use IntelliTrend\Zabbix\Requests\ImageDeleteRequest;
use IntelliTrend\Zabbix\Requests\ImageGetRequest;
use IntelliTrend\Zabbix\Requests\ImageUpdateRequest;

final class ImageApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function create(ImageCreateRequest|array $request): ImageCreateRequest
    {
        return $this->request(ImageCreateRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function delete(ImageDeleteRequest|array $request): ImageDeleteRequest
    {
        return $this->request(ImageDeleteRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(ImageGetRequest|array $request = []): ImageGetRequest
    {
        return $this->request(ImageGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): ImageGetRequest
    {
        return $this->filterRequest(ImageGetRequest::class, $filter);
    }

    /** @param array<string, mixed> $request */
    public function update(ImageUpdateRequest|array $request): ImageUpdateRequest
    {
        return $this->request(ImageUpdateRequest::class, $request);
    }
}
