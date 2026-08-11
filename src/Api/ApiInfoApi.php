<?php

declare(strict_types=1);

namespace IntelliTrend\Zabbix\Api;

use IntelliTrend\Zabbix\Requests\ApiinfoVersionRequest;

final class ApiInfoApi extends AbstractApi
{
    /** @param list<mixed> $request */
    public function version(ApiinfoVersionRequest|array $request = []): ApiinfoVersionRequest
    {
        return $this->request(ApiinfoVersionRequest::class, $request);
    }
}
