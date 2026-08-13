<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Groups;

use Idiot\Zabbix\Api\Requests\ConnectorCreateRequest;
use Idiot\Zabbix\Api\Requests\ConnectorDeleteRequest;
use Idiot\Zabbix\Api\Requests\ConnectorGetRequest;
use Idiot\Zabbix\Api\Requests\ConnectorUpdateRequest;
use Idiot\Zabbix\Request;

final class ConnectorApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function create(ConnectorCreateRequest|array $request): Request
    {
        return $this->request(ConnectorCreateRequest::class, $request);
    }

    /** @param list<mixed> $request */
    public function delete(ConnectorDeleteRequest|array $request): Request
    {
        return $this->request(ConnectorDeleteRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(ConnectorGetRequest|array $request = []): Request
    {
        return $this->request(ConnectorGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): Request
    {
        return $this->filterRequest(ConnectorGetRequest::class, $filter);
    }

    /** @param array<string, mixed> $request */
    public function update(ConnectorUpdateRequest|array $request): Request
    {
        return $this->request(ConnectorUpdateRequest::class, $request);
    }
}
