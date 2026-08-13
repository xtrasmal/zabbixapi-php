<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Groups;

use Idiot\Zabbix\Api\Requests\TrendGetRequest;
use Idiot\Zabbix\Request;

final class TrendApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function get(TrendGetRequest|array $request = []): Request
    {
        return $this->request(TrendGetRequest::class, $request);
    }
}
