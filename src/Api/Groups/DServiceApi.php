<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Groups;

use Idiot\Zabbix\Request;
use Idiot\Zabbix\Requests\DserviceGetRequest;

final class DServiceApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function get(DserviceGetRequest|array $request = []): Request
    {
        return $this->request(DserviceGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): Request
    {
        return $this->filterRequest(DserviceGetRequest::class, $filter);
    }
}
