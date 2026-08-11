<?php

declare(strict_types=1);

namespace IntelliTrend\Zabbix\Api;

use IntelliTrend\Zabbix\Requests\ConnectorCreateRequest;
use IntelliTrend\Zabbix\Requests\ConnectorDeleteRequest;
use IntelliTrend\Zabbix\Requests\ConnectorGetRequest;
use IntelliTrend\Zabbix\Requests\ConnectorUpdateRequest;

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

    /** @param array<string, mixed> $request */
    public function update(ConnectorUpdateRequest|array $request): ConnectorUpdateRequest
    {
        return $this->request(ConnectorUpdateRequest::class, $request);
    }
}
