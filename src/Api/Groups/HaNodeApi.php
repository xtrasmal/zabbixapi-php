<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Groups;

use Idiot\Zabbix\Api\Requests\HanodeGetRequest;
use Idiot\Zabbix\Request;

final class HaNodeApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function get(HanodeGetRequest|array $request = []): Request
    {
        return $this->request(HanodeGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): Request
    {
        return $this->filterRequest(HanodeGetRequest::class, $filter);
    }
}
