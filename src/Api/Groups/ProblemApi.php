<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Groups;

use Idiot\Zabbix\Request;
use Idiot\Zabbix\Requests\ProblemGetRequest;

final class ProblemApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function get(ProblemGetRequest|array $request = []): Request
    {
        return $this->request(ProblemGetRequest::class, $request);
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): Request
    {
        return $this->filterRequest(ProblemGetRequest::class, $filter);
    }
}
