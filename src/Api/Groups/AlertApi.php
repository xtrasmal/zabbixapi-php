<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Groups;

use Idiot\Zabbix\Request;
use Idiot\Zabbix\Requests\AlertGetRequest;

final class AlertApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function get(AlertGetRequest|array $request = []): Request
    {
        return $this->request(AlertGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): Request
    {
        return $this->filterRequest(AlertGetRequest::class, $filter);
    }
}
