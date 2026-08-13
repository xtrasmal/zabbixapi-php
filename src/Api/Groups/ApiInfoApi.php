<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Groups;

use Idiot\Zabbix\Request;
use Idiot\Zabbix\Requests\ApiinfoVersionRequest;

final class ApiInfoApi extends AbstractApi
{
    /** @param list<mixed> $request */
    public function version(ApiinfoVersionRequest|array $request = []): Request
    {
        return $this->request(ApiinfoVersionRequest::class, $request);
    }
}
