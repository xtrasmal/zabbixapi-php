<?php

declare(strict_types=1);

namespace IntelliTrend\Zabbix\Api;

use IntelliTrend\Zabbix\Requests\ScriptCreateRequest;
use IntelliTrend\Zabbix\Requests\ScriptDeleteRequest;
use IntelliTrend\Zabbix\Requests\ScriptExecuteRequest;
use IntelliTrend\Zabbix\Requests\ScriptGetRequest;
use IntelliTrend\Zabbix\Requests\ScriptGetscriptsbyeventsRequest;
use IntelliTrend\Zabbix\Requests\ScriptGetscriptsbyhostsRequest;
use IntelliTrend\Zabbix\Requests\ScriptUpdateRequest;

final class ScriptApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function create(ScriptCreateRequest|array $request): ScriptCreateRequest
    {
        return $this->request(ScriptCreateRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function delete(ScriptDeleteRequest|array $request): ScriptDeleteRequest
    {
        return $this->request(ScriptDeleteRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function execute(ScriptExecuteRequest|array $request): ScriptExecuteRequest
    {
        return $this->request(ScriptExecuteRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(ScriptGetRequest|array $request = []): ScriptGetRequest
    {
        return $this->request(ScriptGetRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function getScriptsByEvents(ScriptGetscriptsbyeventsRequest|array $request): ScriptGetscriptsbyeventsRequest
    {
        return $this->request(ScriptGetscriptsbyeventsRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function getScriptsByHosts(ScriptGetscriptsbyhostsRequest|array $request): ScriptGetscriptsbyhostsRequest
    {
        return $this->request(ScriptGetscriptsbyhostsRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function update(ScriptUpdateRequest|array $request): ScriptUpdateRequest
    {
        return $this->request(ScriptUpdateRequest::class, $request);
    }
}
