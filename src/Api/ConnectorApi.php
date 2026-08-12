<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api;

use Idiot\Zabbix\Requests\ConnectorCreateRequest;
use Idiot\Zabbix\Requests\ConnectorDeleteRequest;
use Idiot\Zabbix\Requests\ConnectorGetRequest;
use Idiot\Zabbix\Requests\ConnectorUpdateRequest;

final class ConnectorApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function create(ConnectorCreateRequest|array $request): ConnectorCreateRequest
    {
        return $this->request(ConnectorCreateRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function delete(ConnectorDeleteRequest|array $request): ConnectorDeleteRequest
    {
        return $this->request(ConnectorDeleteRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(ConnectorGetRequest|array $request = []): ConnectorGetRequest
    {
        return $this->request(ConnectorGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): ConnectorGetRequest
    {
        return $this->filterRequest(ConnectorGetRequest::class, $filter);
    }

    /** @param array<string, mixed> $request */
    public function update(ConnectorUpdateRequest|array $request): ConnectorUpdateRequest
    {
        return $this->request(ConnectorUpdateRequest::class, $request);
    }
}
