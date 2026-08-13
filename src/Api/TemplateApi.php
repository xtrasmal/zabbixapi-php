<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api;

use Idiot\Zabbix\Requests\TemplateCreateRequest;
use Idiot\Zabbix\Requests\TemplateDeleteRequest;
use Idiot\Zabbix\Requests\TemplateGetRequest;
use Idiot\Zabbix\Requests\TemplateMassaddRequest;
use Idiot\Zabbix\Requests\TemplateMassremoveRequest;
use Idiot\Zabbix\Requests\TemplateMassupdateRequest;
use Idiot\Zabbix\Requests\TemplateUpdateRequest;
use Idiot\Zabbix\Requests\ZabbixRequest;

final class TemplateApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function create(TemplateCreateRequest|array $request): ZabbixRequest
    {
        return $this->request(TemplateCreateRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function delete(TemplateDeleteRequest|array $request): ZabbixRequest
    {
        return $this->request(TemplateDeleteRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(TemplateGetRequest|array $request = []): ZabbixRequest
    {
        return $this->request(TemplateGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): ZabbixRequest
    {
        return $this->filterRequest(TemplateGetRequest::class, $filter);
    }

    /** @param array<string, mixed> $request */
    public function massAdd(TemplateMassaddRequest|array $request): ZabbixRequest
    {
        return $this->request(TemplateMassaddRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function massRemove(TemplateMassremoveRequest|array $request): ZabbixRequest
    {
        return $this->request(TemplateMassremoveRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function massUpdate(TemplateMassupdateRequest|array $request): ZabbixRequest
    {
        return $this->request(TemplateMassupdateRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function update(TemplateUpdateRequest|array $request): ZabbixRequest
    {
        return $this->request(TemplateUpdateRequest::class, $request);
    }
}
