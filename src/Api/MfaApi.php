<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api;

use Idiot\Zabbix\Requests\MfaCreateRequest;
use Idiot\Zabbix\Requests\MfaDeleteRequest;
use Idiot\Zabbix\Requests\MfaGetRequest;
use Idiot\Zabbix\Requests\MfaUpdateRequest;
use Idiot\Zabbix\Requests\ZabbixRequest;

final class MfaApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function create(MfaCreateRequest|array $request): ZabbixRequest
    {
        return $this->request(MfaCreateRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function delete(MfaDeleteRequest|array $request): ZabbixRequest
    {
        return $this->request(MfaDeleteRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(MfaGetRequest|array $request = []): ZabbixRequest
    {
        return $this->request(MfaGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): ZabbixRequest
    {
        return $this->filterRequest(MfaGetRequest::class, $filter);
    }

    /** @param array<string, mixed> $request */
    public function update(MfaUpdateRequest|array $request): ZabbixRequest
    {
        return $this->request(MfaUpdateRequest::class, $request);
    }
}
