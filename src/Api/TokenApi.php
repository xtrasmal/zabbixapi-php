<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api;

use Idiot\Zabbix\Requests\TokenCreateRequest;
use Idiot\Zabbix\Requests\TokenDeleteRequest;
use Idiot\Zabbix\Requests\TokenGenerateRequest;
use Idiot\Zabbix\Requests\TokenGetRequest;
use Idiot\Zabbix\Requests\TokenUpdateRequest;

final class TokenApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function create(TokenCreateRequest|array $request): TokenCreateRequest
    {
        return $this->request(TokenCreateRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function delete(TokenDeleteRequest|array $request): TokenDeleteRequest
    {
        return $this->request(TokenDeleteRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function generate(TokenGenerateRequest|array $request): TokenGenerateRequest
    {
        return $this->request(TokenGenerateRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(TokenGetRequest|array $request = []): TokenGetRequest
    {
        return $this->request(TokenGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): TokenGetRequest
    {
        return $this->filterRequest(TokenGetRequest::class, $filter);
    }

    /** @param array<string, mixed> $request */
    public function update(TokenUpdateRequest|array $request): TokenUpdateRequest
    {
        return $this->request(TokenUpdateRequest::class, $request);
    }
}
