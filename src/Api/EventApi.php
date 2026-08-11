<?php

declare(strict_types=1);

namespace IntelliTrend\Zabbix\Api;

use IntelliTrend\Zabbix\Requests\EventAcknowledgeRequest;
use IntelliTrend\Zabbix\Requests\EventGetRequest;

final class EventApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function acknowledge(EventAcknowledgeRequest|array $request): EventAcknowledgeRequest
    {
        return $this->request(EventAcknowledgeRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(EventGetRequest|array $request = []): EventGetRequest
    {
        return $this->request(EventGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): EventGetRequest
    {
        return $this->filterRequest(EventGetRequest::class, $filter);
    }
}
