<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Groups;

use Idiot\Zabbix\Api\Requests\EventAcknowledgeRequest;
use Idiot\Zabbix\Api\Requests\EventGetRequest;
use Idiot\Zabbix\Request;

final class EventApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function acknowledge(EventAcknowledgeRequest|array $request): Request
    {
        return $this->request(EventAcknowledgeRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function get(EventGetRequest|array $request = []): Request
    {
        return $this->request(EventGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): Request
    {
        return $this->filterRequest(EventGetRequest::class, $filter);
    }
}
