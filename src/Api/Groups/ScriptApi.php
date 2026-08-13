<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Groups;

use Idiot\Zabbix\Api\Requests\ScriptCreateRequest;
use Idiot\Zabbix\Api\Requests\ScriptDeleteRequest;
use Idiot\Zabbix\Api\Requests\ScriptExecuteRequest;
use Idiot\Zabbix\Api\Requests\ScriptGetRequest;
use Idiot\Zabbix\Api\Requests\ScriptGetscriptsbyeventsRequest;
use Idiot\Zabbix\Api\Requests\ScriptGetscriptsbyhostsRequest;
use Idiot\Zabbix\Api\Requests\ScriptUpdateRequest;
use Idiot\Zabbix\Request;

final class ScriptApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function create(ScriptCreateRequest|array $request): Request
    {
        return $this->request(ScriptCreateRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function delete(ScriptDeleteRequest|array $request): Request
    {
        return $this->request(ScriptDeleteRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function execute(ScriptExecuteRequest|array $request): Request
    {
        return $this->request(ScriptExecuteRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(ScriptGetRequest|array $request = []): Request
    {
        return $this->request(ScriptGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): Request
    {
        return $this->filterRequest(ScriptGetRequest::class, $filter);
    }

    /** @param list<mixed> $request */
    public function getScriptsByEvents(ScriptGetscriptsbyeventsRequest|array $request): Request
    {
        return $this->request(ScriptGetscriptsbyeventsRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function getScriptsByHosts(ScriptGetscriptsbyhostsRequest|array $request): Request
    {
        return $this->request(ScriptGetscriptsbyhostsRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function update(ScriptUpdateRequest|array $request): Request
    {
        return $this->request(ScriptUpdateRequest::class, $request);
    }
}
