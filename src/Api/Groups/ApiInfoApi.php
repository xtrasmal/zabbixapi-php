<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Groups;

use Idiot\Zabbix\Api\Requests\ApiinfoVersionRequest;
use Idiot\Zabbix\Request;

final class ApiInfoApi extends AbstractApi
{
    /** @param list<mixed> $request */
    public function version(ApiinfoVersionRequest|array $request = []): Request
    {
        return $this->request(ApiinfoVersionRequest::class, $request);
    }
}
