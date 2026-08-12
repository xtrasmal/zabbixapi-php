<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api;

use Idiot\Zabbix\Requests\HanodeGetRequest;

final class HaNodeApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function get(HanodeGetRequest|array $request = []): HanodeGetRequest
    {
        return $this->request(HanodeGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): HanodeGetRequest
    {
        return $this->filterRequest(HanodeGetRequest::class, $filter);
    }
}
