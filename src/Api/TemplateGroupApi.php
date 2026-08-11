<?php

declare(strict_types=1);

namespace IntelliTrend\Zabbix\Api;

use IntelliTrend\Zabbix\Requests\TemplategroupCreateRequest;
use IntelliTrend\Zabbix\Requests\TemplategroupDeleteRequest;
use IntelliTrend\Zabbix\Requests\TemplategroupGetRequest;
use IntelliTrend\Zabbix\Requests\TemplategroupMassaddRequest;
use IntelliTrend\Zabbix\Requests\TemplategroupMassremoveRequest;
use IntelliTrend\Zabbix\Requests\TemplategroupMassupdateRequest;
use IntelliTrend\Zabbix\Requests\TemplategroupPropagateRequest;
use IntelliTrend\Zabbix\Requests\TemplategroupUpdateRequest;

final class TemplateGroupApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function create(TemplategroupCreateRequest|array $request): TemplategroupCreateRequest
    {
        return $this->request(TemplategroupCreateRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function delete(TemplategroupDeleteRequest|array $request): TemplategroupDeleteRequest
    {
        return $this->request(TemplategroupDeleteRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(TemplategroupGetRequest|array $request = []): TemplategroupGetRequest
    {
        return $this->request(TemplategroupGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): TemplategroupGetRequest
    {
        return $this->filterRequest(TemplategroupGetRequest::class, $filter);
    }

    /** @param array<string, mixed> $request */
    public function massAdd(TemplategroupMassaddRequest|array $request): TemplategroupMassaddRequest
    {
        return $this->request(TemplategroupMassaddRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function massRemove(TemplategroupMassremoveRequest|array $request): TemplategroupMassremoveRequest
    {
        return $this->request(TemplategroupMassremoveRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function massUpdate(TemplategroupMassupdateRequest|array $request): TemplategroupMassupdateRequest
    {
        return $this->request(TemplategroupMassupdateRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function propagate(TemplategroupPropagateRequest|array $request): TemplategroupPropagateRequest
    {
        return $this->request(TemplategroupPropagateRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function update(TemplategroupUpdateRequest|array $request): TemplategroupUpdateRequest
    {
        return $this->request(TemplategroupUpdateRequest::class, $request);
    }
}
