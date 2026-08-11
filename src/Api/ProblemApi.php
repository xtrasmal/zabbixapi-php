<?php

declare(strict_types=1);

namespace IntelliTrend\Zabbix\Api;

use IntelliTrend\Zabbix\Requests\ProblemGetRequest;

final class ProblemApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function get(ProblemGetRequest|array $request = []): ProblemGetRequest
    {
        return $this->request(ProblemGetRequest::class, $request);
    }
}
