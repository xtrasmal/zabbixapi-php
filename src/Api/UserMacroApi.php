<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api;

use Idiot\Zabbix\Requests\UsermacroCreateglobalRequest;
use Idiot\Zabbix\Requests\UsermacroCreateRequest;
use Idiot\Zabbix\Requests\UsermacroDeleteglobalRequest;
use Idiot\Zabbix\Requests\UsermacroDeleteRequest;
use Idiot\Zabbix\Requests\UsermacroGetRequest;
use Idiot\Zabbix\Requests\UsermacroUpdateglobalRequest;
use Idiot\Zabbix\Requests\UsermacroUpdateRequest;

final class UserMacroApi extends AbstractApi
{
    /** @param list<mixed> $request */
    public function create(UsermacroCreateRequest|array $request): UsermacroCreateRequest
    {
        return $this->request(UsermacroCreateRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function createGlobal(UsermacroCreateglobalRequest|array $request): UsermacroCreateglobalRequest
    {
        return $this->request(UsermacroCreateglobalRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function delete(UsermacroDeleteRequest|array $request): UsermacroDeleteRequest
    {
        return $this->request(UsermacroDeleteRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function deleteGlobal(UsermacroDeleteglobalRequest|array $request): UsermacroDeleteglobalRequest
    {
        return $this->request(UsermacroDeleteglobalRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(UsermacroGetRequest|array $request = []): UsermacroGetRequest
    {
        return $this->request(UsermacroGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): UsermacroGetRequest
    {
        return $this->filterRequest(UsermacroGetRequest::class, $filter);
    }

    /** @param list<mixed> $request */
    public function update(UsermacroUpdateRequest|array $request): UsermacroUpdateRequest
    {
        return $this->request(UsermacroUpdateRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function updateGlobal(UsermacroUpdateglobalRequest|array $request): UsermacroUpdateglobalRequest
    {
        return $this->request(UsermacroUpdateglobalRequest::class, $request);
    }
}
