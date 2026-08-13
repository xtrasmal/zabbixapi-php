<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Groups;

use Idiot\Zabbix\Request;
use Idiot\Zabbix\Requests\TemplategroupCreateRequest;
use Idiot\Zabbix\Requests\TemplategroupDeleteRequest;
use Idiot\Zabbix\Requests\TemplategroupGetRequest;
use Idiot\Zabbix\Requests\TemplategroupMassaddRequest;
use Idiot\Zabbix\Requests\TemplategroupMassremoveRequest;
use Idiot\Zabbix\Requests\TemplategroupMassupdateRequest;
use Idiot\Zabbix\Requests\TemplategroupPropagateRequest;
use Idiot\Zabbix\Requests\TemplategroupUpdateRequest;

final class TemplateGroupApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function create(TemplategroupCreateRequest|array $request): Request
    {
        return $this->request(TemplategroupCreateRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function delete(TemplategroupDeleteRequest|array $request): Request
    {
        return $this->request(TemplategroupDeleteRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(TemplategroupGetRequest|array $request = []): Request
    {
        return $this->request(TemplategroupGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): Request
    {
        return $this->filterRequest(TemplategroupGetRequest::class, $filter);
    }

    /** @param array<string, mixed> $request */
    public function massAdd(TemplategroupMassaddRequest|array $request): Request
    {
        return $this->request(TemplategroupMassaddRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function massRemove(TemplategroupMassremoveRequest|array $request): Request
    {
        return $this->request(TemplategroupMassremoveRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function massUpdate(TemplategroupMassupdateRequest|array $request): Request
    {
        return $this->request(TemplategroupMassupdateRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function propagate(TemplategroupPropagateRequest|array $request): Request
    {
        return $this->request(TemplategroupPropagateRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function update(TemplategroupUpdateRequest|array $request): Request
    {
        return $this->request(TemplategroupUpdateRequest::class, $request);
    }
}
