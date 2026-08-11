<?php

declare(strict_types=1);

namespace IntelliTrend\Zabbix\Api;

use IntelliTrend\Zabbix\Requests\TemplateCreateRequest;
use IntelliTrend\Zabbix\Requests\TemplateDeleteRequest;
use IntelliTrend\Zabbix\Requests\TemplateGetRequest;
use IntelliTrend\Zabbix\Requests\TemplateMassaddRequest;
use IntelliTrend\Zabbix\Requests\TemplateMassremoveRequest;
use IntelliTrend\Zabbix\Requests\TemplateMassupdateRequest;
use IntelliTrend\Zabbix\Requests\TemplateUpdateRequest;

final class TemplateApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function create(TemplateCreateRequest|array $request): TemplateCreateRequest
    {
        return $this->request(TemplateCreateRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function delete(TemplateDeleteRequest|array $request): TemplateDeleteRequest
    {
        return $this->request(TemplateDeleteRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(TemplateGetRequest|array $request = []): TemplateGetRequest
    {
        return $this->request(TemplateGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): TemplateGetRequest
    {
        return $this->filterRequest(TemplateGetRequest::class, $filter);
    }

    /** @param array<string, mixed> $request */
    public function massAdd(TemplateMassaddRequest|array $request): TemplateMassaddRequest
    {
        return $this->request(TemplateMassaddRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function massRemove(TemplateMassremoveRequest|array $request): TemplateMassremoveRequest
    {
        return $this->request(TemplateMassremoveRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function massUpdate(TemplateMassupdateRequest|array $request): TemplateMassupdateRequest
    {
        return $this->request(TemplateMassupdateRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function update(TemplateUpdateRequest|array $request): TemplateUpdateRequest
    {
        return $this->request(TemplateUpdateRequest::class, $request);
    }
}
