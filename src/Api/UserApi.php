<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api;

use Idiot\Zabbix\Requests\UserCheckAuthenticationRequest;
use Idiot\Zabbix\Requests\UserCreateRequest;
use Idiot\Zabbix\Requests\UserDeleteRequest;
use Idiot\Zabbix\Requests\UserGetRequest;
use Idiot\Zabbix\Requests\UserLoginRequest;
use Idiot\Zabbix\Requests\UserProvisionRequest;
use Idiot\Zabbix\Requests\UserResettotpRequest;
use Idiot\Zabbix\Requests\UserUnblockRequest;
use Idiot\Zabbix\Requests\UserUpdateRequest;

final class UserApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function checkAuthentication(UserCheckAuthenticationRequest|array $request = []): UserCheckAuthenticationRequest
    {
        return $this->request(UserCheckAuthenticationRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function create(UserCreateRequest|array $request): UserCreateRequest
    {
        return $this->request(UserCreateRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function delete(UserDeleteRequest|array $request): UserDeleteRequest
    {
        return $this->request(UserDeleteRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(UserGetRequest|array $request = []): UserGetRequest
    {
        return $this->request(UserGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): UserGetRequest
    {
        return $this->filterRequest(UserGetRequest::class, $filter);
    }

    /** @param array<string, mixed> $request */
    public function login(UserLoginRequest|array $request): UserLoginRequest
    {
        return $this->request(UserLoginRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function provision(UserProvisionRequest|array $request): UserProvisionRequest
    {
        return $this->request(UserProvisionRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function resetTotp(UserResettotpRequest|array $request): UserResettotpRequest
    {
        return $this->request(UserResettotpRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function unblock(UserUnblockRequest|array $request): UserUnblockRequest
    {
        return $this->request(UserUnblockRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function update(UserUpdateRequest|array $request): UserUpdateRequest
    {
        return $this->request(UserUpdateRequest::class, $request);
    }
}
