<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Groups;

use Idiot\Zabbix\Request;
use Idiot\Zabbix\Requests\DhostGetRequest;

final class DHostApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function get(DhostGetRequest|array $request = []): Request
    {
        return $this->request(DhostGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): Request
    {
        return $this->filterRequest(DhostGetRequest::class, $filter);
    }
}
