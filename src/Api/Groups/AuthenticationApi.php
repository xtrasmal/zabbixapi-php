<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Groups;

use Idiot\Zabbix\Api\Requests\AuthenticationGetRequest;
use Idiot\Zabbix\Api\Requests\AuthenticationUpdateRequest;
use Idiot\Zabbix\Request;

final class AuthenticationApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function get(AuthenticationGetRequest|array $request = []): Request
    {
        return $this->request(AuthenticationGetRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function update(AuthenticationUpdateRequest|array $request): Request
    {
        return $this->request(AuthenticationUpdateRequest::class, $request);
    }
}
