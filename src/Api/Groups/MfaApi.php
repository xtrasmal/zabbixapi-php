<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Groups;

use Idiot\Zabbix\Api\Requests\MfaCreateRequest;
use Idiot\Zabbix\Api\Requests\MfaDeleteRequest;
use Idiot\Zabbix\Api\Requests\MfaGetRequest;
use Idiot\Zabbix\Api\Requests\MfaUpdateRequest;
use Idiot\Zabbix\Request;

final class MfaApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function create(MfaCreateRequest|array $request): Request
    {
        return $this->request(MfaCreateRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function delete(MfaDeleteRequest|array $request): Request
    {
        return $this->request(MfaDeleteRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(MfaGetRequest|array $request = []): Request
    {
        return $this->request(MfaGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): Request
    {
        return $this->filterRequest(MfaGetRequest::class, $filter);
    }

    /** @param array<string, mixed> $request */
    public function update(MfaUpdateRequest|array $request): Request
    {
        return $this->request(MfaUpdateRequest::class, $request);
    }
}
