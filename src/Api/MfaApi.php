<?php

declare(strict_types=1);

namespace IntelliTrend\Zabbix\Api;

use IntelliTrend\Zabbix\Requests\MfaCreateRequest;
use IntelliTrend\Zabbix\Requests\MfaDeleteRequest;
use IntelliTrend\Zabbix\Requests\MfaGetRequest;
use IntelliTrend\Zabbix\Requests\MfaUpdateRequest;

final class MfaApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function create(MfaCreateRequest|array $request): MfaCreateRequest
    {
        return $this->request(MfaCreateRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function delete(MfaDeleteRequest|array $request): MfaDeleteRequest
    {
        return $this->request(MfaDeleteRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(MfaGetRequest|array $request = []): MfaGetRequest
    {
        return $this->request(MfaGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): MfaGetRequest
    {
        return $this->filterRequest(MfaGetRequest::class, $filter);
    }

    /** @param array<string, mixed> $request */
    public function update(MfaUpdateRequest|array $request): MfaUpdateRequest
    {
        return $this->request(MfaUpdateRequest::class, $request);
    }
}
