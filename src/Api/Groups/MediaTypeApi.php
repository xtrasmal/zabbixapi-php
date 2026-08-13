<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Groups;

use Idiot\Zabbix\Api\Requests\MediatypeCreateRequest;
use Idiot\Zabbix\Api\Requests\MediatypeDeleteRequest;
use Idiot\Zabbix\Api\Requests\MediatypeGetRequest;
use Idiot\Zabbix\Api\Requests\MediatypeUpdateRequest;
use Idiot\Zabbix\Request;

final class MediaTypeApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function create(MediatypeCreateRequest|array $request): Request
    {
        return $this->request(MediatypeCreateRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function delete(MediatypeDeleteRequest|array $request): Request
    {
        return $this->request(MediatypeDeleteRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(MediatypeGetRequest|array $request = []): Request
    {
        return $this->request(MediatypeGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): Request
    {
        return $this->filterRequest(MediatypeGetRequest::class, $filter);
    }

    /** @param array<string, mixed> $request */
    public function update(MediatypeUpdateRequest|array $request): Request
    {
        return $this->request(MediatypeUpdateRequest::class, $request);
    }
}
