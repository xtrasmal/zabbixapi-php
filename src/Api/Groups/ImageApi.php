<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Groups;

use Idiot\Zabbix\Request;
use Idiot\Zabbix\Requests\ImageCreateRequest;
use Idiot\Zabbix\Requests\ImageDeleteRequest;
use Idiot\Zabbix\Requests\ImageGetRequest;
use Idiot\Zabbix\Requests\ImageUpdateRequest;

final class ImageApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function create(ImageCreateRequest|array $request): Request
    {
        return $this->request(ImageCreateRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function delete(ImageDeleteRequest|array $request): Request
    {
        return $this->request(ImageDeleteRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(ImageGetRequest|array $request = []): Request
    {
        return $this->request(ImageGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): Request
    {
        return $this->filterRequest(ImageGetRequest::class, $filter);
    }

    /** @param array<string, mixed> $request */
    public function update(ImageUpdateRequest|array $request): Request
    {
        return $this->request(ImageUpdateRequest::class, $request);
    }
}
