<?php

declare(strict_types=1);

namespace IntelliTrend\Zabbix\Api;

use IntelliTrend\Zabbix\Requests\AuthenticationGetRequest;
use IntelliTrend\Zabbix\Requests\AuthenticationUpdateRequest;

final class AuthenticationApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function get(AuthenticationGetRequest|array $request = []): AuthenticationGetRequest
    {
        return $this->request(AuthenticationGetRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function update(AuthenticationUpdateRequest|array $request): AuthenticationUpdateRequest
    {
        return $this->request(AuthenticationUpdateRequest::class, $request);
    }
}
