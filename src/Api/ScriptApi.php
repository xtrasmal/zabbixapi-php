<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api;

use Idiot\Zabbix\Requests\ScriptCreateRequest;
use Idiot\Zabbix\Requests\ScriptDeleteRequest;
use Idiot\Zabbix\Requests\ScriptExecuteRequest;
use Idiot\Zabbix\Requests\ScriptGetRequest;
use Idiot\Zabbix\Requests\ScriptGetscriptsbyeventsRequest;
use Idiot\Zabbix\Requests\ScriptGetscriptsbyhostsRequest;
use Idiot\Zabbix\Requests\ScriptUpdateRequest;
use Idiot\Zabbix\Requests\ZabbixRequest;

final class ScriptApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function create(ScriptCreateRequest|array $request): ZabbixRequest
    {
        return $this->request(ScriptCreateRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function delete(ScriptDeleteRequest|array $request): ZabbixRequest
    {
        return $this->request(ScriptDeleteRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function execute(ScriptExecuteRequest|array $request): ZabbixRequest
    {
        return $this->request(ScriptExecuteRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(ScriptGetRequest|array $request = []): ZabbixRequest
    {
        return $this->request(ScriptGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): ZabbixRequest
    {
        return $this->filterRequest(ScriptGetRequest::class, $filter);
    }

    /** @param list<mixed> $request */
    public function getScriptsByEvents(ScriptGetscriptsbyeventsRequest|array $request): ZabbixRequest
    {
        return $this->request(ScriptGetscriptsbyeventsRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function getScriptsByHosts(ScriptGetscriptsbyhostsRequest|array $request): ZabbixRequest
    {
        return $this->request(ScriptGetscriptsbyhostsRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function update(ScriptUpdateRequest|array $request): ZabbixRequest
    {
        return $this->request(ScriptUpdateRequest::class, $request);
    }
}
