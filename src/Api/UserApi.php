<?php

declare(strict_types=1);

namespace IntelliTrend\Zabbix\Api;

use IntelliTrend\Zabbix\Requests\UserCreateRequest;
use IntelliTrend\Zabbix\Requests\UserCheckAuthenticationRequest;
use IntelliTrend\Zabbix\Requests\UserDeleteRequest;
use IntelliTrend\Zabbix\Requests\UserGetRequest;
use IntelliTrend\Zabbix\Requests\UserLoginRequest;
use IntelliTrend\Zabbix\Requests\UserLogoutRequest;
use IntelliTrend\Zabbix\Requests\UserProvisionRequest;
use IntelliTrend\Zabbix\Requests\UserResettotpRequest;
use IntelliTrend\Zabbix\Requests\UserUnblockRequest;
use IntelliTrend\Zabbix\Requests\UserUpdateRequest;

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
    public function logout(UserLogoutRequest|array $request = []): UserLogoutRequest
    {
        return $this->request(UserLogoutRequest::class, $request);
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
