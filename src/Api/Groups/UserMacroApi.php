<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Groups;

use Idiot\Zabbix\Api\Requests\UsermacroCreateglobalRequest;
use Idiot\Zabbix\Api\Requests\UsermacroCreateRequest;
use Idiot\Zabbix\Api\Requests\UsermacroDeleteglobalRequest;
use Idiot\Zabbix\Api\Requests\UsermacroDeleteRequest;
use Idiot\Zabbix\Api\Requests\UsermacroGetRequest;
use Idiot\Zabbix\Api\Requests\UsermacroUpdateglobalRequest;
use Idiot\Zabbix\Api\Requests\UsermacroUpdateRequest;
use Idiot\Zabbix\Request;

final class UserMacroApi extends AbstractApi
{
    /** @param list<mixed> $request */
    public function create(UsermacroCreateRequest|array $request): Request
    {
        return $this->request(UsermacroCreateRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function createGlobal(UsermacroCreateglobalRequest|array $request): Request
    {
        return $this->request(UsermacroCreateglobalRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function delete(UsermacroDeleteRequest|array $request): Request
    {
        return $this->request(UsermacroDeleteRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function deleteGlobal(UsermacroDeleteglobalRequest|array $request): Request
    {
        return $this->request(UsermacroDeleteglobalRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(UsermacroGetRequest|array $request = []): Request
    {
        return $this->request(UsermacroGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): Request
    {
        return $this->filterRequest(UsermacroGetRequest::class, $filter);
    }

    /** @param list<mixed> $request */
    public function update(UsermacroUpdateRequest|array $request): Request
    {
        return $this->request(UsermacroUpdateRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function updateGlobal(UsermacroUpdateglobalRequest|array $request): Request
    {
        return $this->request(UsermacroUpdateglobalRequest::class, $request);
    }
}
