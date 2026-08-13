<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Groups;

use Idiot\Zabbix\Request;
use Idiot\Zabbix\Requests\TrendGetRequest;

final class TrendApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function get(TrendGetRequest|array $request = []): Request
    {
        return $this->request(TrendGetRequest::class, $request);
    }
}
