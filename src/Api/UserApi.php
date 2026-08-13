<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api;

use Idiot\Zabbix\Requests\UserCheckAuthenticationRequest;
use Idiot\Zabbix\Requests\UserCreateRequest;
use Idiot\Zabbix\Requests\UserDeleteRequest;
use Idiot\Zabbix\Requests\UserGetRequest;
use Idiot\Zabbix\Requests\UserLoginRequest;
use Idiot\Zabbix\Requests\UserLogoutRequest;
use Idiot\Zabbix\Requests\UserProvisionRequest;
use Idiot\Zabbix\Requests\UserResettotpRequest;
use Idiot\Zabbix\Requests\UserUnblockRequest;
use Idiot\Zabbix\Requests\UserUpdateRequest;
use Idiot\Zabbix\Requests\ZabbixRequest;

final class UserApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function checkAuthentication(UserCheckAuthenticationRequest|array $request = []): ZabbixRequest
    {
        return $this->request(UserCheckAuthenticationRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function create(UserCreateRequest|array $request): ZabbixRequest
    {
        return $this->request(UserCreateRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function delete(UserDeleteRequest|array $request): ZabbixRequest
    {
        return $this->request(UserDeleteRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(UserGetRequest|array $request = []): ZabbixRequest
    {
        return $this->request(UserGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): ZabbixRequest
    {
        return $this->filterRequest(UserGetRequest::class, $filter);
    }

    /** @param array<string, mixed> $request */
    public function login(UserLoginRequest|array $request): ZabbixRequest
    {
        return $this->request(UserLoginRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function logout(UserLogoutRequest|array $request = []): ZabbixRequest
    {
        return $this->request(UserLogoutRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function provision(UserProvisionRequest|array $request): ZabbixRequest
    {
        return $this->request(UserProvisionRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function resetTotp(UserResettotpRequest|array $request): ZabbixRequest
    {
        return $this->request(UserResettotpRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function unblock(UserUnblockRequest|array $request): ZabbixRequest
    {
        return $this->request(UserUnblockRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function update(UserUpdateRequest|array $request): ZabbixRequest
    {
        return $this->request(UserUpdateRequest::class, $request);
    }
}
