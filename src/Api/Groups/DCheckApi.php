<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Groups;

use Idiot\Zabbix\Request;
use Idiot\Zabbix\Requests\DcheckGetRequest;

final class DCheckApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function get(DcheckGetRequest|array $request = []): Request
    {
        return $this->request(DcheckGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): Request
    {
        return $this->filterRequest(DcheckGetRequest::class, $filter);
    }
}
