<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api;

use Idiot\Zabbix\Requests\AuthenticationGetRequest;
use Idiot\Zabbix\Requests\AuthenticationUpdateRequest;
use Idiot\Zabbix\Requests\ZabbixRequest;

final class AuthenticationApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function get(AuthenticationGetRequest|array $request = []): ZabbixRequest
    {
        return $this->request(AuthenticationGetRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function update(AuthenticationUpdateRequest|array $request): ZabbixRequest
    {
        return $this->request(AuthenticationUpdateRequest::class, $request);
    }
}
