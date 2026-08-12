<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api;

use Idiot\Zabbix\Requests\MediatypeCreateRequest;
use Idiot\Zabbix\Requests\MediatypeDeleteRequest;
use Idiot\Zabbix\Requests\MediatypeGetRequest;
use Idiot\Zabbix\Requests\MediatypeUpdateRequest;

final class MediaTypeApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function create(MediatypeCreateRequest|array $request): MediatypeCreateRequest
    {
        return $this->request(MediatypeCreateRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function delete(MediatypeDeleteRequest|array $request): MediatypeDeleteRequest
    {
        return $this->request(MediatypeDeleteRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(MediatypeGetRequest|array $request = []): MediatypeGetRequest
    {
        return $this->request(MediatypeGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): MediatypeGetRequest
    {
        return $this->filterRequest(MediatypeGetRequest::class, $filter);
    }

    /** @param array<string, mixed> $request */
    public function update(MediatypeUpdateRequest|array $request): MediatypeUpdateRequest
    {
        return $this->request(MediatypeUpdateRequest::class, $request);
    }
}
