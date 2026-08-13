<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Groups;

use Idiot\Zabbix\Api\Requests\TemplateCreateRequest;
use Idiot\Zabbix\Api\Requests\TemplateDeleteRequest;
use Idiot\Zabbix\Api\Requests\TemplateGetRequest;
use Idiot\Zabbix\Api\Requests\TemplateMassaddRequest;
use Idiot\Zabbix\Api\Requests\TemplateMassremoveRequest;
use Idiot\Zabbix\Api\Requests\TemplateMassupdateRequest;
use Idiot\Zabbix\Api\Requests\TemplateUpdateRequest;
use Idiot\Zabbix\Request;

final class TemplateApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function create(TemplateCreateRequest|array $request): Request
    {
        return $this->request(TemplateCreateRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function delete(TemplateDeleteRequest|array $request): Request
    {
        return $this->request(TemplateDeleteRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(TemplateGetRequest|array $request = []): Request
    {
        return $this->request(TemplateGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): Request
    {
        return $this->filterRequest(TemplateGetRequest::class, $filter);
    }

    /** @param array<string, mixed> $request */
    public function massAdd(TemplateMassaddRequest|array $request): Request
    {
        return $this->request(TemplateMassaddRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function massRemove(TemplateMassremoveRequest|array $request): Request
    {
        return $this->request(TemplateMassremoveRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function massUpdate(TemplateMassupdateRequest|array $request): Request
    {
        return $this->request(TemplateMassupdateRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function update(TemplateUpdateRequest|array $request): Request
    {
        return $this->request(TemplateUpdateRequest::class, $request);
    }
}
