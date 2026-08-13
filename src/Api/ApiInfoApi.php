<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api;

use Idiot\Zabbix\Requests\ApiinfoVersionRequest;
use Idiot\Zabbix\Requests\ZabbixRequest;

final class ApiInfoApi extends AbstractApi
{
    /** @param list<mixed> $request */
    public function version(ApiinfoVersionRequest|array $request = []): ZabbixRequest
    {
        return $this->request(ApiinfoVersionRequest::class, $request);
    }
}
