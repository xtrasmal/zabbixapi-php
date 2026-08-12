<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api;

use Idiot\Zabbix\Requests\ApiinfoVersionRequest;

final class ApiInfoApi extends AbstractApi
{
    /** @param list<mixed> $request */
    public function version(ApiinfoVersionRequest|array $request = []): ApiinfoVersionRequest
    {
        return $this->request(ApiinfoVersionRequest::class, $request);
    }
}
