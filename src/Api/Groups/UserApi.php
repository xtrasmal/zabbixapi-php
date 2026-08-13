<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Groups;

use Idiot\Zabbix\Api\Requests\UserCheckAuthenticationRequest;
use Idiot\Zabbix\Api\Requests\UserCreateRequest;
use Idiot\Zabbix\Api\Requests\UserDeleteRequest;
use Idiot\Zabbix\Api\Requests\UserGetRequest;
use Idiot\Zabbix\Api\Requests\UserLoginRequest;
use Idiot\Zabbix\Api\Requests\UserLogoutRequest;
use Idiot\Zabbix\Api\Requests\UserProvisionRequest;
use Idiot\Zabbix\Api\Requests\UserResettotpRequest;
use Idiot\Zabbix\Api\Requests\UserUnblockRequest;
use Idiot\Zabbix\Api\Requests\UserUpdateRequest;
use Idiot\Zabbix\Request;

final class UserApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function checkAuthentication(UserCheckAuthenticationRequest|array $request = []): Request
    {
        return $this->request(UserCheckAuthenticationRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function create(UserCreateRequest|array $request): Request
    {
        return $this->request(UserCreateRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function delete(UserDeleteRequest|array $request): Request
    {
        return $this->request(UserDeleteRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(UserGetRequest|array $request = []): Request
    {
        return $this->request(UserGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): Request
    {
        return $this->filterRequest(UserGetRequest::class, $filter);
    }

    /** @param array<string, mixed> $request */
    public function login(UserLoginRequest|array $request): Request
    {
        return $this->request(UserLoginRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function logout(UserLogoutRequest|array $request = []): Request
    {
        return $this->request(UserLogoutRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function provision(UserProvisionRequest|array $request): Request
    {
        return $this->request(UserProvisionRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function resetTotp(UserResettotpRequest|array $request): Request
    {
        return $this->request(UserResettotpRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function unblock(UserUnblockRequest|array $request): Request
    {
        return $this->request(UserUnblockRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function update(UserUpdateRequest|array $request): Request
    {
        return $this->request(UserUpdateRequest::class, $request);
    }
}
