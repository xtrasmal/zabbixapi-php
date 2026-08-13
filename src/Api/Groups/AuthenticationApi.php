<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Groups;

use Idiot\Zabbix\Request;
use Idiot\Zabbix\Requests\AuthenticationGetRequest;
use Idiot\Zabbix\Requests\AuthenticationUpdateRequest;

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
