<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api;

use Idiot\Zabbix\Requests\ImageCreateRequest;
use Idiot\Zabbix\Requests\ImageDeleteRequest;
use Idiot\Zabbix\Requests\ImageGetRequest;
use Idiot\Zabbix\Requests\ImageUpdateRequest;

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
